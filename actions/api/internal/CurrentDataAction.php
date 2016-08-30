<?php
/**
 * @copyright Copyright (C) 2016 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

namespace app\actions\api\internal;

use Yii;
use app\assets\MapImageAsset;
use app\models\GameMode;
use app\models\Map;
use app\models\PeriodMap;
use app\models\Weapon;
use app\models\WeaponType;
use yii\helpers\Url;
use yii\web\ViewAction;

class CurrentDataAction extends ViewAction
{
    public function init()
    {
        parent::init();
        Yii::$app->response->format = YII_ENV_DEV ? 'json' : 'compact-json';
    }

    public function run()
    {
        return [
            'current' => $this->getCurrentInfo(),
            'rules' => $this->getRules(),
            'maps' => $this->getMaps(),
            'weapons' => $this->getWeapons(),
        ];
    }

    public function getCurrentInfo()
    {
        $info = function (array $periodMaps) : array {
            if (!$periodMaps) {
                return [];
            }
            return [
                'rule' => [
                    'key' => $periodMaps[0]->rule->key,
                    'name' => Yii::t('app-rule', $periodMaps[0]->rule->name),
                ],
                'maps' => array_map(
                    function (PeriodMap $pm) : string {
                        return $pm->map->key;
                    },
                    $periodMaps
                ),
            ];
        };

        return [
            'fest'    => false,
            'regular' => $info(PeriodMap::findCurrentRegular()->all()),
            'gachi'   => $info(PeriodMap::findCurrentGachi()->all()),
        ];
    }

    public function getRules()
    {
        $ret = [];
        foreach (GameMode::find()->with('rules')->asArray()->all() as $mode) {
            $ret[$mode['key']] = (function (array $rules) : array {
                $tmp = [];
                foreach ($rules as $rule) {
                    $tmp[$rule['key']] = [
                        'name' => Yii::t('app-rule', $rule['name']),
                    ];
                }
                uasort($tmp, function ($a, $b) {
                    return strcasecmp($a['name'], $b['name']);
                });
                return $tmp;
            })($mode['rules']);
        }
        return $ret;
    }

    public function getMaps()
    {
        $assetManager = Yii::$app->assetManager;
        $asset = $assetManager->getBundle(MapImageAsset::class);

        $ret = [];
        foreach (Map::find()->asArray()->all() as $map) {
            $ret[$map['key']] = [
                'name'      => Yii::t('app-map', $map['name']),
                'shortName' => Yii::t('app-map', $map['short_name']),
                'image'     => Url::to($assetManager->getAssetUrl($asset, "daytime/{$map['key']}.jpg"), true),
            ];
        }
        uasort($ret, function ($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });
        return $ret;
    }

    public function getWeapons()
    {
        $ret = [];
        foreach (WeaponType::find()->orderBy('[[id]]')->asArray()->all() as $type) {
            $ret = array_merge($ret, (function (array $type) : array {
                $tmp = [];
                foreach (Weapon::find()->andWhere(['type_id' => $type['id']])->asArray()->all() as $_) {
                    $tmp[$_['key']] = [
                        'name' => Yii::t('app-weapon', $_['name']),
                    ];
                }
                uasort($tmp, function ($a, $b) {
                    return strcasecmp($a['name'], $b['name']);
                });
                return $tmp;
            })($type));
        }
        return $ret;
    }
}
