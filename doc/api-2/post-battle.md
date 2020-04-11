`POST / api / v2 / battle`
===================

| | |
|-|-|
| Verb | `POST` |
| URL | `https: // stat.ink / api / v2 / battle` |
| Return-Type | If successful `201 Created` (no body) <br> If unsuccessful` application / json` or `text / html` <br> If it already exists` 302 Found` |
| Auth | [Needed] (authorization.md) |

Post battle data to stat.ink.

Please refer to [request-body.md] (request-body.md) for the request body format at the time of posting.

If the submission is successful, the result will be returned in the HTTP response header as follows:

| Response Header | Example of value | Meaning |
|-|-|-|
| `Location` |` https: // stat.ink / @ username / spl2 / 42` | The battle details page displayed on the browser |
| `X-Api-Location` |` https: // stat.ink / api / v2 / battle / 42` | This is the URL to use with the API |
| `X-User-Screen-Name` |` username` | The username included in the URL |
| `X-Battle-Id` |` 42` | The number identifying the battle |


Parameters parameters
--------------------

Basically all parameters can be omitted. However, if there is not enough content, an error will occur.

POST data must not exceed 12 MiB in total.

| Key <br> Param. Name | Value type <br> Type ||
|-|-|-|
| `uuid` | String (up to 64 characters) <br> Recommended: [UUID] (https://tools.ietf.org/html/rfc4122) | Used to check for duplicate battles. <br> If a POST with the same UUID is performed within a certain period, the server returns the previous information without saving. (See below) |
| `splatnet_number` | Integer (1 ~) | Specify the battle number (` battle_number`) of Squid ring 2 (SplatNet 2). |
| `lobby` | Specified string | Specify the lobby from which you battled. (See below) |
| `mode` | Specified string | Specifies the play mode in which the battle was performed. (See below) |
| `rule` | Specified string | Specify which rule was used for the battle. (See below) |
| `stage` | Specified character string | Specify which stage (map) the battle was performed on. (See below) |
| `weapon` | Specified string | Specifies which buki was used by the player who posted this battle. (See below) |
| `result` | Specified string | Set the value according to the battle result. <br> `win`: victory <br>` lose`: defeat |
| `knock_out` | Specified string | Set a value according to the end method in the Gachi match rule. <br> `yes`: Knockout win / loss <br>` no`: Time out win / loss |
| `rank_in_team` | Integer (1 ~ 4) | Specifies the position of the player in the team on the result screen. |
| `kill` | Integer (0-99) | Specifies the number of kills for the player. |
| `death` | Integer (0-99) | Specifies the number of deaths for the player. |
| `max_kill_combo` | Integer (0-) | Specifies the maximum number of combos during a battle when" killing "is further defined as" combo "during the display. |
| `max_kill_streak` | Integer (0-) | Maximum during a battle when the kill (= how many consecutive kills before inactivity) is defined as" streak " Specify the number of streaks. |
| `kill_or_assist` | Integer (0-) | Specifies the number of kills + assists of the player. (For Splatoon 2 specification scoreboard) |
| `special` | integer (0-) | Specifies the number of special uses of the player. (For Splatoon 2 specification scoreboard) |
| `freshness` | Numeric value (0.0 to 99.9) | Specify the value of the choice. |
| `level` | Integer (1-99) | Specifies the rank of the player at the start of the battle. |
| `level_after` | Integer (1-99) | Similarly, specify the rank after the battle ends. |
| `star_rank` | Integer (0-) | Specifies the number of times the rank has been reset to 99 after rank 99. If you can find `star_rank` in Squid Ring 2 (SplatNet 2), specify its value. If you only know that it has a star, specify 1. |
| `rank` | Specified string | Specifies the player's demema at the start of the battle. |
| `rank_exp` | Integer (0-50) | S +, Specify the Udemae number at the start of the battle. |
| `rank_after` | Specified string | Specifies the Ude-Mae when the player's battle ends. |
| `rank_exp_after` | Integer (0 ~ 50) | S +, Specify the number of Udemae at the end of battle. |
| `x_power` | Number (0.0 ~ 9999.9?) | X Power (before the battle) |
| `x_power_after` | Number (0.0 ～ 9999.9?) | X Power (after the battle) |
| `estimate_x_power` | Integer (0 ~) | Estimate X Power |
| `my_point` | Integer (0-) | Specify the number of points you have painted plus the winning bonus. (Points remain on screen) |
| `estimate_gachi_power` | Integer | Specify the estimated power. |
| `league_point` | Number (e.g.1234.5) | Specifies the league power. |
| `my_team_estimate_league_point` | Integer | Specify your team's estimated league power. |
| `his_team_estimate_league_point` | Integer | Specifies the estimated league power of the opponent's team. |
| `my_team_point` | Integer (0 ~) | Specify the final paint point of your team on the result screen. |
| `his_team_point` | Integer (0 ~) | Similarly, specify the enemy team's point. |
| `my_team_percent` | Number (0.0-100.0) | Similarly, specify the percentage of your team's fill points. |
| `his_team_percent` | Number (0.0-100.0) | Specify the percentage of the enemy team as well. |
| `my_team_count` | Integer (0-100) | Specify the final count of your team on the result screen. (For Gachimatch, initial 0, knockout 100) |
| `his_team_count` | Integer (0 ~ 100) | Similarly, specify the count of the enemy team. |
| `my_team_id` | Character string | Specify an ID to identify your team in Squid ring 2 (SplatNet 2) JSON. (`tag_id`?) |
| `his_team_id` | String | Specify the ID to identify the enemy team in the same way, but I think you probably can't get it. |
| `species` | Specification string | Specify the type of squid or octopus. <br> Specify species (Inklings or Octolings) <br> `inkling`: Squid-Inklings <br>` octoling`: Octopus (Octolings) |
| `gender` | Specified string | Specify the gender of your squid. This item is used at festivals. <br> `boy`: Boy <br>` girl`: Girl |
| `fest_title` | Specified string | Specify the title of the festival. |
| `fest_exp` | Integer (0-999) | Specifies the experience value of the festival. Charisma 42/99 42 |
| `fest_title_after` | Specified string | Specify the title of the festival. (Value after battle) |
| `fest_exp_after` | Integer (0-999) | Specifies the experience value of the festival. (Value after battle) |
| `fest_power` | Numeric value (e.g. 1234.5) | Specifies the festival power. |
| `my_team_estimate_fest_power` | Integer | Specify the estimated festival power for your team. |
| `his_team_estimate_fest_power` | Integer | Specifies the estimated fest power of the enemy team. |
| `my_team_fest_theme` || String <br> String | Specifies the theme of the festival's own team. <br> Player team's theme <br> Example: Bamboo shoot village <br> e.g. Ice Cream |
| `his_team_fest_theme` || String <br> String | Specifies the theme of the enemy team at the festival. <br> Enemy team's theme |
| `my_team_nickname` | String <br> String | Specify the nickname of your team at the festival. <br> Player team's nickname on Splatfest <br> Example: Glasses Shooter Squid Group <br> e.g. The Nearsighted Shooter Squid Warriors |
| `his_team_nickname` | String <br> String | Specify the nickname of the enemy team at the festival. <br> Enemy team's nickname on Splatfest |
| `clout` | Integer (0 ~) <br> Integer (0-) | Specify the contribution obtained from the festival battle. <br> Obtained clout <br> Note: `total_clout` +` clout` = `total_clout_after` |
| `total_clout` | Integer (0 ~) <br> Integer (0-) | Specifies the total contribution (before the battle). <br> Total clout value (before the battle) |
| `total_clout_after` | Integer (0-) <br> Integer (0-) | Specifies the total contribution (after battle). <br> Total clout value (after the battle) |
| `synergy_bonus` | Number (1.0-9.9) <br> Number (1.0-9.9) | Specify the multiplier (1.0, 1.5, etc.) for the matching bonus. <br> Synergy bonus (e.g. 1.0, 1.5) |
| `my_team_win_streak` | Integer <br> Integer | Integer | Specify the number of wins in your team. <br> Win streak (Good guys) |
| `his_team_win_streak` | Integer <br> Integer | Integer | Specifies the number of consecutive wins of the enemy team. <br> Win streak (Bad guys) |
| `special_battle` | Specification string <br> Key | Specifies the rare battle type of the festival. <br> Specify special battle on Splatfest <br> `10x`: 10x Battle-10x Battle <br>` 100x`: 100x Battle-100x Battle |
| `gears` | Structure | Specifies the player gear configuration. (See below) <br> Specify gear configuration (the player) |
| `players` | Structure | Specify data for 8 players including you. (See below) |
| `death_reasons` | Map | Specify the cause of death. (See below) |
| `events` | Array | Specify the time series data corresponding to the progress in the game. (See below) |
| `splatnet_json` | Object or string | Specify the JSON that indicates the battle of Squid ring 2 (SplatNet 2) as it is. The object obtained by decoding JSON may be specified as it is, or the result of serializing JSON as a character string may be specified. |
| `automated` | Specified string | Specifies whether to post automatically or manually. <br> This information is used to determine if it can be used for overall statistics. <br> (Consider deliberately indicating that it is easy to send only victory data) <br> `yes`: Automated (mechanically processed) <br>` no `: Not automated (manual input, etc.) |
| `link_url` | String (URL) | Specifies the URL associated with this battle. <br> In general, specify the URL to YouTube where you uploaded the battle recording. |
| `note` | string | Specifies the note associated with this battle. |
| `private_note` | String | Similar, but specifies a secret note that cannot be viewed by anyone other than you. |
| `agent` | String (up to 64 characters) | Specify the name of the client to use for posting. <br> Specify the name of the software, for example, `IkaLog`. <br> Choose a name that does not conflict with other clients. <br> When you specify this, you must also specify `agent_version`. |
| `agent_version` | String (less than 255 characters) | Specifies the version information of the client indicated by` agent`. <br> You can also include information about the architecture and OS. |
| `agent_custom` | string | You can specify the data that the client will use for itself. stat.ink doesn't care about the contents. |
| `agent_variables` | Maps | You can specify client-defined key values. (See below) |
| `image_judge` | Image binary (PNG / JPEG) | Specify a screenshot of the judge screen. |
| `image_result` | Image binary (PNG / JPEG) | Specify the screenshot of the result screen (screen with data for 8 people). |
| `image_gear` | Image binary (PNG / JPEG) | Specify a screenshot of the gear configuration screen. |
| `start_at` | Integer (UNIX time) | Specify the battle start date and time in unix time (unit: seconds). |
| `end_at` | Integer (UNIX time) | Specify the battle end date and time in unix time (unit: seconds). |

Note: Value-Types:

-"String": "String"

  -"_N_ characters or less": "_N_ characters or few"

-"Specified string": "Pre-defined string" (key-string)

-"Integer": "Integer"

  -"Integer (UNIX time)": "Integer (UNIX time)" (Seconds from 1970-01-01T00: 00: 00 + 00: 00 (Jan 1st 1970 00:00:00 GMT / UTC, British Time))

 -"_N_ ~": "_N_ or upper"

 -"_N_ to _M_": "_N_ ≤ (value) ≤ _M_"
  
-"Number": "Number"

-"Image binary": "Binary-data of image"

-"Structure": "Structure"

-"Array": "Array"

-"Map": "Map" (associative array)

`uuid`
------

When `uuid` is specified, the server behaves as follows. <br>
If you set a `uuid`, stat.ink behaves as follows.

`` `
if already_has_same_uuid_battle? // Is there a battle with the same UUID?
  then
    if is_same_user? and is_recently? // recently posted by the same user?
      then
        [skip_register_new_battle] // do not register a new battle
        return "HTTP 302 Found"

[register_new_battle] // Register a new battle
return "HTTP 201 Created"
`` `

"Recent" is currently one day (86400 seconds). <br>
"recently" means 1 day (86400 seconds) at this time. (There is no consideration for DST.)

It is recommended that clients generate and send as follows: <br>
I strongly recommend the client generate and transmit UUID as follows:

-Standalone Application (like IkaLog, IkaRec or "stat.ink web client")

  -Generate a random-based UUID (UUID version 4)

  -Define your own namespace-UUID and generate UUID version 5 with that NS-UUID

  -Send nothing <br> Nothing generate

-SplatNet 2-based Application (like SquidTracks or splatnet2statink)

  -Generate a UUID version 5 with namespace `73cf052a-fd0b-11e7-a5ee-001b21a098c2` using the special namespace` 73cf052a-fd0b-11e7-a5ee-001b21a098c2`

    -Use `battle number (battle_number)` `@` `player ID (principal_id)` for the value. (Example: `42 @ abc123`) <br>
      Use `battle_number`` @ `` principal_id`. (Example: `42 @ abc123`) <br>
      `uuid_v5 (" 73cf052a-fd0b-11e7-a5ee-001b21a098c2 ", sprintf ("% d @% s ", battle_id, principal_id))`

    -Use this namespace only for this format. <br>
      Please use this namespace-UUID for this format only.

  -Define your own namespace-UUID and generate UUID version 5 with that NS-UUID


| Type <br> App type | UUID version | Namespace <br> Namespace | Value of generator <br> generate from |
| ------------------------------ | -------------- | --- ------------------------------------- | ------------ ------------------------------------------ |
| Standalone <br> Standalone | version 4 | N / A | N / A (Random) |
Standalone <br> Standalone | version 5 | Original <br> You defined | Original <br> You defined (like `seqencial_id @ install_id`) |
| Squid ring 2 <br> SplatNet 2 | version 5 | `73cf052a-fd0b-11e7-a5ee-001b21a098c2` |` battle_number @ principal_id` (e.g. `42 @ abc123`) |
| Squid Ring2 <br> SplatNet 2 | version 5 | Original <br> You defined | Original <br> You defined |


Example of generated value of UUID v5 (when using namespace `73cf052a-fd0b-11e7-a5ee-001b21a098c2`) <br>
Example for UUID v5 (if use namespace `73cf052a-fd0b-11e7-a5ee-001b21a098c2`):

| `battle_number` | User's` principal_id` | UUID (generated) |
| ----------------- | ----------------------- | ------- --------------------------------- |
| `1` |` abc123` | `adbeb6a9-c314-58f6-9396-293a06fb2d5b` |
| `42` |` abc123` | `666cdcb7-aad2-5bc6-bb02-940d2c2f8301` |
`12345` |` abc123` | `8f9df1f6-bfdc-5852-99d2-2fce58326733` |
| `1` |` 3f6fb10a91b0c551` | `829040da-a42f-567f-bb12-d83626ef827b` |
| `42` |` 3f6fb10a91b0c551` | `fcf512db-63c0-590c-888b-6c1a5fc6ec3f` |
| `12345` |` 3f6fb10a91b0c551` | `52bfe526-b275-5873-8f8a-b0b374b070ba` |


Reference: [frozenpandaman / splatnet2statink # 30] (https://github.com/frozenpandaman/splatnet2statink/issues/30#issuecomment-358935305)



`lobby`,` mode`, `rule`
-----------------------

`lobby` takes one of the following values:

| Specified string | Content |
|-|-|
| `standard` | Solo (Nora, Solo), [v4] Fes (Challenge), [v3] Fes (Solo) <br> Solo Queue, [v4] Splatfest (Pro) |
| `squad_2` | League (2 players) <br> League (Twin) |
| `squad_4` | League (four), [v3] Fest (team) <br> League (Quad), [v3] Splatfest (Team) |
| `fest_normal` | Fest (regular) <br> [v4] Splatfest (Normal) |
| `fest_pro` | Fest (Challenge) <br> Splatfest (Pro) |
| `private` | Private match | Private battle |

* `Fest_pro` is added for convenience and can be replaced with` standard` (it becomes `standard` when using the acquisition API) <br>
Can`fest_pro` has added for convinience.The canonical key is still `standard`.If you use GET API, you will get` standard`.

`mode` takes one of the following values:

| Specified string | Content |
|-|-|
| `regular` | Regular Match <br> Regular Battle |
| `gachi` | Gachi Battle <br> Ranked Battle |
| `fest` | Fest <br> Splatfest |
| `private` | Private Match <br> Private Battle |

`rule` takes one of the following values:

| Specified string | Content |
|-|-|
| `nawabari` | Nawabari Battle <br> Turf War |
| `area` | Gachi Area <br> Splat Zones |
| `yagura` | Gachiyagra <br> Tower Control |
| `hoko` | Gachihoko <br> Rainmaker |
| `asari` | Gachisari <br> Clam Blitz |

`lobby`,` mode`, and `rule` are actually the following combinations.

| Play | number of players | `lobby` |` mode` | `rule` ||
| ------ | ---------- | ------- | ------ | ------ |-|
| Regular <br> Regular | 1 person <br> Solo | `standard` |` regular` | `nawabari` ||
| Regular <br> Regular | Join <br> Join to friend | `standard` |` regular` | `nawabari` | No distinction <br> Same as Solo |
| Gachi Match <br> Ranked | 1 person <br> Solo | `standard` |` gachi` | `area`,` yagura`, `hoko`,` asari` |
| Gachi Match <br> Ranked | League (2) <br> League (Twin) | `squad_2` |` gachi` | `area`,` yagura`, `hoko`,` asari` |
| Gachi Match <br> Ranked | League (4 players) <br> League (Quad) | `squad_4` |` gachi` | `area`,` yagura`, `hoko`,` asari` |
| v4 festival <br> v4 Splatfest | regular <br> Normal | `fest_normal` |` fest` | `nawabari` ||
| v4 Festival <br> v4 Splatfest | Challenge <br> Pro | `standard` <br> (or` fest_pro`) | `fest` |` nawabari` ||
| v1-3 Festival <br> v1-3 Splatfest | Solo <br> Solo | `standard` |` fest` | `nawabari` | deprecated |
| v1-3 Festival <br> v1-3 Splatfest | Team <br> Team | `squad_4` |` fest` | `nawabari` | deprecated |
| Prabe <br> Private |-| `private` |` private` | `nawabari`,` area`, `yagura`,` hoko`, `asari` |


`stage`
-------

Detailed information can be obtained with [GET /api/v2/stage](get-stage.md).

Also, a list page that refers to the actual database is [here] (https://stat.ink/api-info/stage2). <br>
There is a listing page [here] (https://stat.ink/api-info/stage2).

When sending to the API, send the character string described in "Specified character string" (example: `kombu`). <br>
You should send "Key String" below (e.g. `kombu`).

As a secondary option, you can also send `# 5` and" `#` + number "(not recommended). <br>
You can also send "` # `+ SplatNet-Number" like `# 5` as a secondary option (not recommended).

<!-replace: stage->
| Specified character string <br> Key String | Squid ring <br> SplatNet | Stage <br> Stage Name | Remarks <br> Remarks |
| ------------------------ | ---------------------- |- -------------------------------------------------- -------------------- | ----------------------------- ------------------------------------------------ |
| `ajifry` |` 18` | Ajifly Stadium <br> Goby Arena | |
| `ama` |` 4` | Ama Art University <br> Inkblot Art Academy |
| `anchovy` |` 21` | Ancho-Bit Games <br> Ancho-V Games |
| `arowana` |` 15` | Arowana Mall <br> Arowana Mall | |
| `battera` |` 0` | Battera Street <br> The Reef |
| `bbass` |` 11` | B Bus Park <br> Blackbelly Skatepark |
| `chozame` |` 3` | Sturgeon Shipyard | |
| `devon` |` 12` | The Devon Maritime Museum <br> Shellendorf Institute |
| `engawa` |` 9` | Engawa Riverbed <br> Snapper Canal |
| `fujitsubo` |` 1` | Barnacle Sports Club <br> Musselforge Fitness | |
| `gangaze` |` 2` | Gangaze Outdoor Music Hall <br> Starfish Mainstage |
| `hakofugu` |` 14` | Hakofugu Warehouse <br> Walleye Warehouse |
| `hokke` |` 7` | Hocke Pier <br> Port Mackerel | |
| `kombu` |` 5` | Comb truck <br> Humpback Pump Track | Also accepts `combu` for compatibility <br> Also accepts` combu` for compatibility |
| `manta` |` 6` | Manta Maria <br> Manta Maria |
| `mongara` |` 16` | Mongara Campground <br> Camp Triggerfish |
| `mozuku` |` 10` | Mozuku Farm <br> Kelp Dome |
| `mutsugoro` |` 22` | Mitsugo Tower <br> Skipper Pavilion |
| `mystery_01` |` 101` | Mystery: Reminiscence Slide <br> Shifty: Wayslide Cool | |
| `mystery_02` |` 102` | Mystery: Meet at the Hill of Promise <br> Shifty: The Secret of S.P.L.A.T. | |
| `mystery_03` |` 103` | Mystery: Handsome sponge <br> Shifty: Goosponge | |
| `mystery_04` |` 100` | Mystery: Windmill Kiss <br> Shifty: Windmill House on the Pearlie |
| `mystery_05` |` 107` | Mystery: Bar Clan <br> Shifty: Fancy Spew | |
| `mystery_06` |` 106` | Mystery: Transparent Boy <br> Shifty: Zone of Glass | |
| `mystery_07` |` 105` | Mystery: Hime-chan's Cannon <br> Shifty: Cannon Fire Pearl | |
| `mystery_08` |` 110` | Mystery: Tojitoji <br> Shifty: The Bunker Games | |
| `mystery_09` |` 108` | Mystery: Mischievous Hikiyose <br> Shifty: Grapplink Girl | |
| `mystery_10` |` 109` | Mystery: Tomorrow Denden <br> Shifty: Zappy Longshocking | |
| `mystery_11` |` 111` | Mystery: Balancer Lovers <br> Shifty: A Swiftly Tilting Balance | |
| `mystery_12` |` 113` | Mystery: Takoashi Notice! <br> Shifty: Sweet Valley Tentacles | |
| `mystery_13` |` 112` | Mystery: Nuri and breath of switch <br> Shifty: The Switches | |
| `mystery_14` |` 114` | Mystery: Jumpmat Poems <br> Shifty: The Bouncey Twins |
| `mystery_15` |` 115` | Mystery: Ride on your heart! <br> Shifty: Railway Chillin '| |
| `mystery_16` |` 116` | Mystery: Rose of Kanketsen <br> Shifty: Gusher Towns | |
| `mystery_17` |` 117` | Mystery: Koi wa Dash × 3 <br> Shifty: The Maze Dasher | |
| `mystery_18` |` 118` | Mystery: Dozer Moon <br> Shifty: Flooders in the Attic |
| `mystery_19` |` 119` | Mystery: Quick Basket <br> Shifty: The Splat in Our Zones | |
| `mystery_20` |` 120` | Mystery: Nurinuri Tonight <br> Shifty: The Ink is Spreading |
| `mystery_21` |` 121` | Mystery: Big ゠ panel does not stop <br> Shifty: Bridge to Tentaswitchia | |
| `mystery_22` |` 122` | Mystery: Memories of Korogallium <br> Shifty: The Chronicles of Rolonium |
| `mystery_23` |` 123` | Mystery: Not Piropiro <br> Shifty: Furler in the Ashes | |
| `mystery_24` |` 124` | Mystery: DEAR SENPAI <br> Shifty: MC.Princess Diaries | |
| `otoro` |` 19` | Hotel New Autoro <br> New Albacore Hotel |
| `shottsuru` |` 17` | Schotzl Mine <br> Piranha Pit | |
| `sumeshi` |` 20` | Smecy World <br> Wahoo World | |
| `tachiuo` |` 8` | Tachiuo Parking <br> Moray Towers | |
| `zatou` |` 13` | Zatou Market <br> MakoMart | |
| `mystery` |` 9999` | Mystery Zone <br> Shifty Station | Fest Only Stage <br> For Splatfest |
<!-endreplace->


`weapon`
--------

Detailed information can be obtained with [GET /api/v2/weapon](get-weapon.md).

Also, a list page that refers to the actual database is [here] (https://stat.ink/api-info/weapon2). <br>
There is a listing page [here] (https://stat.ink/api-info/weapon2).

When sending to the API, send the character string described in "Specified character string" (example: `52gal`). <br>
You should send "Key String" below (e.g. `52gal`).

As a secondary option, you can also send `# 50` and" `#` + number "(not recommended). <br>
You can also send "` # `+ SplatNet-Number" like `# 50` as a secondary option (not recommended).

<!-replace: weapon->
| Specified string <br> Key String | Squid ring <br> SplatNet | Buki <br> Weapon Name |
| ------------------------ | ---------------------- |- -------------------------------------------------- -------- | ----------------------------------------- -------------------------------------------------- ---------- |
| `52gal` |` 50` | .52 gallon <br> .52 Gal | |
| `52gal_becchu` |` 52` | .52 Gallon Betchu <br> Kensa .52 Gal | |
| `52gal_deco` |` 51` | .52 Gallon Deco <br> .52 Gal Deco |
| `96gal` |` 80` | .96 gallon <br> .96 Gal | |
| `96gal_deco` |` 81` | .96 Gallon Deco <br> .96 Gal Deco |
| `bold` |` 0` | Bold marker <br> Sploosh-o-matic | |
| `bold_7` |` 2` | Bold marker 7 <br> Sploosh-o-matic 7 | |
| `bold_neo` |` 1` | Bold Marker Neo <br> Neo Sploosh-o-matic | |
| `bottlegeyser` |` 400` | Bottle Geyser <br> Squeezer | |
| `bottlegeyser_foil` |` 401` | Bottle Geyser Foil <br> Foil Squeezer |
| `heroshooter_replica` |` 45` | Hero Shot Replica <br> Hero Shot Replica |
| `jetsweeper` |` 90` | Jet Squelcher | |
| `jetsweeper_custom` |` 91` | Jet Sweeper Custom <br> Custom Jet Squelcher |
| `momiji` |` 11` | Maple Shooter <br> Custom Splattershot Jr. | |
| `nzap83` |` 62` | N-ZAP83 <br> N-ZAP '83 | |
| `nzap85` |` 60` | N-ZAP85 <br> N-ZAP '85 | |
| `nzap89` |` 61` | N-ZAP89 <br> N-ZAP '89 | |
| `ochiba` |` 12` | Ochiba Shooter <br> Kensa Splattershot Jr. |
| `octoshooter_replica` |` 46` | Octoshooter Replica <br> Octo Shot Replica |
| `prime` |` 70` | Prime Shooter <br> Splattershot Pro |
| `prime_becchu` |` 72` | Prime Shooter Betchu <br> Kensa Splattershot Pro |
| `prime_collabo` |` 71` | Prime Shooter Collaboration <br> Forge Splattershot Pro |
| `promodeler_mg` |` 30` | Promodeler MG <br> Aerospray MG | |
| `promodeler_pg` |` 32` | Promodeler PG <br> Aerospray PG | |
| `promodeler_rg` |` 31` | Promodeler RG <br> Aerospray RG | |
| `sharp` |` 20` | Sharp marker <br> Splash-o-matic |
| `sharp_neo` |` 21` | Sharp Marker Neo <br> Neo Splash-o-matic |
| `sshooter` |` 40` | Splasher <br> Splattershot |
| `sshooter_becchu` |` 42` | Splasher Betchu <br> Kensa Splattershot |
| `sshooter_collabo` |` 41` | Splasher Collaboration <br> Tentatek Splattershot |
| `wakaba` |` 10` | Wakaba Shooter <br> Splattershot Jr. | |
| `clashblaster` |` 230` | Crash Blaster <br> Clash Blaster |
| `clashblaster_neo` |` 231` | Clash Blaster Neo <br> Clash Blaster Neo |
| `heroblaster_replica` |` 215` | Hero Blaster Replica <br> Hero Blaster Replica |
| `hotblaster` |` 210` | Hot blaster <br> Blaster | |
| `hotblaster_custom` |` 211` | Hot Blaster Custom <br> Custom Blaster |
| `longblaster` |` 220` | Long Blaster <br> Range Blaster |
| `longblaster_custom` |` 221` | Long blaster custom <br> Custom Range Blaster |
| `longblaster_necro` |` 222` | Longblaster Necro <br> Grim Range Blaster |
| `nova` |` 200` | Nova Blaster <br> Luna Blaster |
| `nova_becchu` |` 202` | Nova Blaster Betchu <br> Kensa Luna Blaster |
| `nova_neo` |` 201` | Nova Blaster Neo <br> Luna Blaster Neo |
| `rapid` |` 240` | Rapid Blaster <br> Rapid Blaster |
| `rapid_becchu` |` 242` | Rapid Blaster Betchu <br> Kensa Rapid Blaster |
| `rapid_deco` |` 241` | Rapid Blaster Deco | |
| `rapid_elite` |` 250` | R Blaster Elite <br> Rapid Blaster Pro |
| `rapid_elite_deco` |` 251` | R Blaster Elite Deco <br> Rapid Blaster Pro Deco |
| `h3reelgun` |` 310` | H3 reel gun <br> H-3 Nozzlenose |
| `h3reelgun_cherry` |` 312` | H3 Reel Gun Cherry <br> Cherry H-3 Nozzlenose |
| `h3reelgun_d` |` 311` | H3 Reelgun D <br> H-3 Nozzlenose D | |
| `l3reelgun` |` 300` | L3 reel gun <br> L-3 Nozzlenose |
| `l3reelgun_becchu` |` 302` | L3 reel gunbetchu <br> Kensa L-3 Nozzlenose |
| `l3reelgun_d` |` 301` | L3 reel gun D <br> L-3 Nozzlenose D | |
| `dualsweeper` |` 5030` | Dual Sweeper <br> Dualie Squelchers |
| `dualsweeper_custom` |` 5031` | Dual Sweeper Custom <br> Custom Dualie Squelchers |
| `heromaneuver_replica` |` 5015` | Hero Roman New Bar Replica <br> Hero Dualie Replicas | |
| `kelvin525` |` 5020` | Kelvin 525 <br> Glooga Dualies |
| `kelvin525_becchu` |` 5022` | Kelvin 525 Betchu <br> Kensa Glooga Dualies |
| `kelvin525_deco` |` 5021` | Kelvin 525 Deco <br> Glooga Dualies Deco |
| `maneuver` |` 5010` | Supramaneuver <br> Splat Dualies | We accept `manueuver` for compatibility <br> Also accepts` manueuver` for compatibility |
| `maneuver_becchu` |` 5012` | Suprama New Barbetchu <br> Kensa Splat Dualies |
| `maneuver_collabo` |` 5011` | <br> Enperry Splat Dualies | We accept `manueuver_collabo` for compatibility <br> Also accepts` manueuver_collabo` for compatibility |
| `quadhopper_black` |` 5040` | Quadhopper Black <br> Dark Tetra Dualies |
| `quadhopper_white` |` 5041` | Quad Hopper White <br> Light Tetra Dualies |
| `sputtery` |` 5000` | Spattery <br> Dapple Dualies |
| `sputtery_clear` |` 5002` | Spear Clear <br> Clear Dapple Dualies |
| `sputtery_hue` |` 5001` | Spattery Hugh <br> Dapple Dualies Nouveau |
| `carbon` |` 1000` | Carbon Roller <br> Carbon Roller |
| `carbon_deco` |` 1001` | Carbon Roller Deco | |
| `dynamo` |` 1020` | Dynamo Roller | |
| `dynamo_becchu` |` 1022` | Dynamo Roller Betchu <br> Kensa Dynamo Roller |
| `dynamo_tesla` |` 1021` | Dynamo Roller Tesla <br> Gold Dynamo Roller |
| `heroroller_replica` |` 1015` | Hero Roller Replica <br> Hero Roller Replica |
| `splatroller` |` 1010` | Splat Roller <br> Splat Roller |
| `splatroller_becchu` |` 1012` | Splasher Betchu <br> Kensa Splat Roller |
| `splatroller_collabo` |` 1011` | Splat roller collaboration <br> Krak-On Splat Roller |
| `variableroller` |` 1030` | Variable Roller <br> Flingza Roller |
| `variableroller_foil` |` 1031` | Variable Roller Foil <br> Foil Flingza Roller |
| `herobrush_replica` |` 1115` | Herobrush Replica <br> Herobrush Replica |
| `hokusai` |` 1110` | Hokusai <br> Octobrush | |
| `hokusai_becchu` |` 1112` | Hokusai Betchu <br> Kensa Octobrush |
| `hokusai_hue` |` 1111` | Hokusai Hugh <br> Octobrush Nouveau |
| `pablo` |` 1100` | Pablo <br> Inkbrush | |
| `pablo_hue` |` 1101` | Pablo Hugh <br> Inkbrush Nouveau | We also accept `publo_hue` for compatibility <br> Also accepts` publo_hue` for compatibility |
| `pablo_permanent` |` 1102` | Permanent Pablo <br> Permanent Inkbrush | |
| `bamboo14mk1` |` 2050` | Bamboozler 14 Mk I |
| `bamboo14mk2` |` 2051` | Bamboozler 14 Mk II |
| `bamboo14mk3` |` 2052` | Bamboozler 14 Mk III |
| `herocharger_replica` |` 2015` | Hero Charger Replica <br> Hero Charger Replica |
| `liter4k` |` 2030` | liter 4K <br> E-liter 4K | |
| `liter4k_custom` |` 2031` | Liter 4K Custom <br> Custom E-liter 4K | |
| `liter4k_scope` |` 2040` | 4K Scope <br> E-liter 4K Scope |
| `liter4k_scope_custom` |` 2041` | 4K Scope Custom <br> Custom E-liter 4K Scope |
| `soytuber` |` 2060` | Soytuber <br> Goo Tuber | |
| `soytuber_custom` |` 2061` | Soytuber Custom <br> Custom Goo Tuber | |
| `splatcharger` |` 2010` | Splat Charger <br> Splat Charger |
| `splatcharger_becchu` |` 2012` | Splatger Betchu <br> Kensa Charger |
| `splatcharger_collabo` |` 2011` | Splasher Collaboration <br> Firefin Splat Charger |
| `splatscope` |` 2020` | Splatscope <br> Splatterscope | |
| `splatscope_becchu` |` 2022` | Splatscope Betchu <br> Kensa Splatterscope |
| `splatscope_collabo` |` 2021` | Splatscope Collaboration <br> Firefin Splatterscope |
| `squiclean_a` |` 2000` | Swiqlin α <br> Classic Squiffer |
| `squiclean_b` |` 2001` | Swiklyn β <br> New Squiffer |
| `squiclean_g` |` 2002` | Swiklin γ <br> Fresh Squiffer |
| `bucketslosher` |` 3000` | bucket slosher <br> Slosher |
| `bucketslosher_deco` |` 3001` | Bucket Slosher Deco <br> Slosher Deco |
| `bucketslosher_soda` |` 3002` | Soda Slosher <br> Soda Slosher |
| `explosher` |` 3040` | Exploser <br> Explosher | |
| `explosher_custom` |` 3041` | Exploser Custom <br> Custom Explosher |
| `furo` |` 3030` | Overblower <br> Bloblobber |
| `furo_deco` |` 3031` | Over Frosher Deco <br> Bloblobber Deco |
| `heroslosher_replica` |` 3005` | Hero Slosher Replica <br> Hero Slosher Replica |
| `hissen` |` 3010` | Hissen <br> Tri-Slosher |
| `hissen_hue` |` 3011` | Hissen Hugh <br> Tri-Slosher Nouveau |
| `screwslosher` |` 3020` | Sloshing Machine <br> Sloshing Machine |
| `screwslosher_becchu` |` 3022` | Screw Sloshing Betchu <br> Kensa Sloshing Machine |
| `screwslosher_neo` |` 3021` | Sloshing Machine Neo <br> Sloshing Machine Neo |
| `barrelspinner` |` 4010` | Barrel Spinner <br> Heavy Splatling |
| `barrelspinner_deco` |` 4011` | Barrel Spinner Deco <br> Heavy Splatling Deco |
| `barrelspinner_remix` |` 4012` | Barrel Spinner Remix <br> Heavy Splatling Remix |
| `herospinner_replica` |` 4015` | Hero Spinner Replica <br> Hero Splatling Replica |
| `hydra` |` 4020` | Hydrant <br> Hydra Splatling |
| `hydra_custom` |` 4021` | Hydrant Custom <br> Custom Hydra Splatling |
| `kugelschreiber` |` 4030` | Kugelschreiber <br> Ballpoint Splatling |
| `kugelschreiber_hue` |` 4031` | Kugelschreiber Hue <br> Ballpoint Splatling Nouveau | |
| `nautilus47` |` 4040` | Nautilus 47 <br> Nautilus 47 | |
| `nautilus79` |` 4041` | Nautilus 79 <br> Nautilus 79 | |
| `splatspinner` |` 4000` | Splasher Mini Splatling | |
| `splatspinner_becchu` |` 4002` | Spraspinner Betchu <br> Kensa Mini Splatling |
| `splatspinner_collabo` |` 4001` | Splash Piner Collaboration <br> Zink Mini Splatling |
| `campingshelter` |` 6010` | Camping shelter <br> Tenta Brella | |
| `campingshelter_camo` |` 6012` | Camping shelter car <br> Tenta Camo Brella |
| `campingshelter_sorella` |` 6011` | Camping shelter Sorella <br> Tenta Sorella Brella | |
| `heroshelter_replica` |` 6005` | Hero Brella Replica <br> Hero Brella Replica |
| `parashelter` |` 6000` | para shelter <br> Splat Brella | |
| `parashelter_sorella` |` 6001` | Parallel Sorella <br> Sorella Brella | |
| `spygadget` |` 6020` | Spy Gadget <br> Undercover Brella |
| `spygadget_becchu` |` 6022` | Spygadget Betchu <br> Kensa Undercover Brella | |
| `spygadget_sorella` |` 6021` | Spygadget Sorella <br> Undercover Sorella Brella |
<!-endreplace->


`rank`,` rank_after`
--------------------

For `rank` and` rank_after`, specify udemae before and after play starts.

| Specified character string |
|-|-|
| c- | C- |
| c | C |
| c + | C + |
| b- | B- |
| b | B |
| b + | B + |
| a- | A- |
| a | A |
| a + | A + |
| s | S |
| s + | S + |
| x | X |


`fest_title`,` fest_title_after`
--------------------------------

For `fest_title` and` fest_title_after`, specify the title of the festival before and after the battle.

Some of the values ​​you specify may indicate gender, but ** specify the same regardless of gender **. (Specify gender with `gender`.) <br>
Regardless of gender, specify the same key-string. (Use `gender` to specify gender)

| Key | Title (Boy) | Title (Boy) | Title (Girl) | Title (Girl) |
|-|-|-|
| `fanboy` | Normal Theme Boy <br> * Something * Fanboy | Normal Theme Girl <br> * Something * Fangirl |
| `fiend` | The True" Theme "Boy <br> * Something * Fiend | The True <Theme> Girl <br> * Something * Fiend |
| `defender` | Super" Theme "Boy <br> * Something * Defender | Super <Theme> Girl <br> * Something * Defender |
| `champion` | Charismatic Theme Boy <br> * Something * Champion | Charismatic Theme Girl <br> * Something * Champion |
| `king` | Een's Theme Boy <br> * Something * King | Een's Theme Girl <br> * Something * Queen |

The key value is the English (North American) version of the title for the boy in lowercase.


`gears` Structure
-----------------

`gears` specifies the following structure. <br>
Specifies structure like below: <br>

`` `js
"gears": {
  "headgear": {
    "gear": "white_headband",
    "primary_ability": "last_ditch_effort",
    "secondary_abilities": [
      "ink_saver_main",
      "ink_saver_sub",
      null
    ]
  },
  "clothing": {
    // ...
  },
  "shoes": {
    // ...
  }
}
`` `

! [] (img / gear.png)

Gear lists are below: <br>
[Atama Headgear] (https://stat.ink/api-info/gear2-headgear) <br>
[Fuku Clothing] (https://stat.ink/api-info/gear2-clothing) <br>
[Kuts Shoes] (https://stat.ink/api-info/gear2-shoes)

When sending the gear type to the API, send the character string described in “Specified character string” (eg, `white_headband`). <br>
You should send "Key String" as "gear" below (e.g. `white_headband`).

You can also send `# 42` and" `#` + number "as secondary options (not recommended). <br>
You can also send "` # `+ SplatNet-Number" like `# 42` as a secondary option (not recommended).

This secondary option can be used as an alternative to gear name designation, but not as a gear power alternative. <br>
You cannot use this secondary option to Gear Ability.


See the list in the next section for gear power. <br>
For abilities, please refer the list in next section ("Gear Ability").


Gear Ability
------------

<!-replace: ability->
| Specified character string <br> Key String | Squid ring <br> SplatNet | Gear power <br> Ability Name |
| ------------------------ | ---------------------- |- --------------------------------------------- | ---- ----------- |
| `ability_doubler` |` 108` | Additional gear power doubling <br> Ability Doubler |
| `bomb_defense_up` |` 12` | Bomb Damage Reduction <br> Bomb Defense Up |
| `bomb_defense_up_dx` |` 200` | Bomb Damage Reduction / Revision <br> Bomb Defense Up DX |
| `cold_blooded` |` 13` | Shortened marking time <br> Cold-Blooded | |
| `comeback` |` 103` | Comeback <br> Comeback | |
| `drop_roller` |` 111` | Passive art <br> Drop Roller |
| `haunt` |` 105` | Revenge <br> Haunt | |
| `ink_recovery_up` |` 2` | Ink Recovery Up | |
| `ink_resistance_up` |` 11` | Ink Resistance Reduction <br> Ink Resistance Up |
| `ink_saver_main` |` 0` | Ink Saver (Main) <br> Ink Saver (Main) | |
| `ink_saver_sub` |` 1` | Ink efficiency improvement (sub) <br> Ink Saver (Sub) | |
| `last_ditch_effort` |` 101` | Last spurt <br> Last-Ditch Effort |
| `main_power_up` |` 201` | Main Power Up <br> Main Power Up |
| `ninja_squid` |` 104` | Ika Ninja <br> Ninja Squid | |
| `object_shredder` |` 110` | Increase Objective Attack <br> Object Shredder | |
| `opening_gambit` |` 100` | Start Dash <br> Opening Gambit |
| `quick_respawn` |` 8` | Resurrection time reduction <br> Quick Respawn | |
| `quick_super_jump` |` 9` | Short jump time <br> Quick Super Jump |
| `respawn_punisher` |` 107` | Resurrection penalty up <br> Respawn Punisher | |
| `run_speed_up` |` 3` | Human movement speed up <br> Run Speed ​​Up |
| `special_charge_up` |` 5` | Special Charge Up <br> Special Charge Up | |
| `special_power_up` |` 7` | Special Power Up <br> Special Power Up |
| `special_saver` |` 6` | Special reduction amount <br> Special Saver | |
| `stealth_jump` |` 109` | Stealth Jump <br> Stealth Jump |
| `sub_power_up` |` 10` | Sub Power Up <br> Sub Power Up |
| `swim_speed_up` |` 4` | Squid Dash Speed ​​Up <br> Swim Speed ​​Up | |
| `tenacity` |` 102` | Adversity Enhancement <br> Tenacity |
| `thermal_ink` |` 106` | Thermal Ink <br> Thermal Ink |
<!-endreplace->


`players`
---------

In `players`, set information of 2 to 8 friends and enemies in an array. The content of the array is the structure described below, and it looks like this as a whole. (JSON)

`` `js
{
  // ...
  "players": [
    {
      // structure, see below
    },
    // 2 to 8 elements
  ],
  // ...
}
`` `

| Key | value type ||
|-|-|-|
| `team` | Specified string |` my`: My team <br> `his`: Opponent's team |
| `is_me` | Specified string |` yes`: Author <br> `no`: Other than Author |
| `weapon` | Specified string | Weapon of the player (specified value is as described above) |
| `level` | Integer (1-99) | Specifies the player's rank |
| `star_rank` | Integer (0 ~) | Specify the rank of the player |
| `rank` | Specified string | Specifies the player's udemae (specified values ​​are as described above) |
| `rank_in_team` | Integer (1-4) | Specifies the position of the player in each team |
| `kill` | Integer (0-99) | Specifies the number of kills for that player |
| `death` | integer (0-99) | Specifies the number of deaths for that player |
| `kill_or_assist` | Integer (0-) | Specifies the kill count + assist count of the player |
| `special` | integer (0-) | Specifies the number of special uses for that player |
| `point` | integer (0 ~) | Specifies the player's point (painted area + bonus) |
| `my_kill` | integer (0-) | Specifies the number of deaths that the posted player has killed among the player's deaths |
| `name` | String (1-10 characters) | Specify the name of the player |
| `species` | Specification string | Specify the type of squid or octopus. <br> Specify species (Inklings or Octolings) <br> `inkling`: Squid-Inklings <br>` octoling`: Octopus (Octolings) |
| `gender` | Specified string | The gender of the player <br>` boy`: Boy <br> `girl`: Girl |
| `fest_title` | Specified string | The fest title in the battle of that player (specified value is as described above) |
| `top_500` | Boolean |` yes`: This player is ranked into the Top Players List <br> `no`: Not so. <br> (empty): unknown etc. |
| `splatnet_id` | String | Specifies the ID (` principal_id`) that identifies the player, as shown on Squid Ring 2 (SplatNet 2) |


`death_reasons`
---------------

Aggregate the cause and number of deaths of the players and set them.

Set a map with the cause of death as the key and the number of times as the value.

If you die once in the off-field fall and twice in the Supramaneuver, you will get the following message:

`` `js
{
  // ...
  "death_reasons": {
    "oob": 1,
    "manueuver": 2
  },
  // ...
}
`` `

The key causes of death are the specified string for `weapon` and the following values:

<!-replace: death->
| Specified string <br> Key String | Death cause <br> Death Reason |
| ------------------------ | ------------------------ ----------- |
| `drown` | Scratch <br> Drowning |
| `fall` | Fall | Fall |
| `oob` | Out of Bounds |
| `cannon` | Cannon <br> Cannon |
| `iidabomb` | Iidabomb <br> Hyperbomb |
| `piropiro` | Piropiro <br> Inkfurler |
| `senpaicannon` | Sengai Cannon <br> Princess Cannon |
| `curlingbomb` | Curling Bomb |
| `kyubanbomb` | Cuban Bomb <br> Suction Bomb |
| `quickbomb` | Quick Bomb <br> Burst Bomb |
| `robotbomb` | Robot Bomb <br> Autobomb |
| `splashbomb` | Splash Bomb |
| `splashshield` | Splash Shield <br> Splash Wall |
| `sprinkler` | Sprinkler <br> Sprinkler |
| `trap` | Trap <br> Ink Mine |
| `amefurashi` | Amefurashi <br> Ink Storm |
| `bubble` | Bubble Launcher <br> Bubble Blower |
| `chakuchi` | Super Chakchi <br> Splashdown |
| `jetpack` | Jetpack <br> Inkjet |
| `missile` | Multi Missile <br> Tenta Missiles |
| `presser` | Hyperpresser <br> Sting Ray |
| `sphere` | Ikasphere <br> Baller |
<!-endreplace->


`events`
--------

Specify the time series event data that occurred during the battle in an array.

`` `js
{
  // ...
  "events": [
    {
      "at": 0.1,
      "type": "point",
      "point": 2
    },
    // ...
  ],
  // ...
}
`` `

| Key | value type | required? ||
|-|-|-|-|
| `at` | Number | Required | Event occurrence timing (second from the start of battle) |
| `type` | string | required | event type |
| type dependent key ||| type dependent value


### `type: point`

Events related to changes in fill points.

| Key | value type | required? ||
|-|-|-|-|
| `point` | Number (0 ~) | Required | Specify the fill point |


### `type: killed`

An event indicating that a player has killed another player.

No additional information is available.


### `type: dead`

Event indicating that a player was killed by another player.

| Key | value type | required? ||
|-|-|-|-|
| `reason` | Specified string || Specifies the cause of death. You can use the specified value of `death_reasons`. |


### `type: special%`

This event indicates the accumulation status of the special gauge of the player.

| Key | value type | required? ||
|-|-|-|-|
| `point` | Numeric value (0-100) | Required | Specify the special gauge pool |


### `type: alive_inklings`

This event indicates the life and death status of each player. I expect it to be issued at the changed timing.

| Key | value type | required? ||
|-|-|-|-|
| `my_team` | array | required | Shows the life of the team. |
| `his_team` | array | required | shows the life and death of the enemy team. |

Both `my_team` and` his_team` are arrays of up to 4 elements, with live squid being `true` and dead squid being` false`.

`` `js
{
  "at": 42.0,
  "type": "alive_inklings",
  "my_team": [true, true, true, false],
  "his_team": [true, true, false, true]
}
`` `

Over writing


`agent_variables`
-----------------

You can specify a simple key-value pair in the sending client definition.
Both key and value must be valid UTF-8 strings.
This item is displayed in the battle details as "additional information".
The entire length of the POST data, including this parameter, must be within 12 MiB.

`key` only recommends the alphanumeric characters of` snake_case`.

The handling of data where `key` contains only numbers is undefined.

The handling when passing non-string data to `value` is undefined.


----

[! [CC-BY 4.0] (https://stat.ink/static-assets/cc/cc-by.svg)] (http://creativecommons.org/licenses/by/4.0/deed.ja)

This text is licensed under [Creative Commons-Attribution 4.0 International] (http://creativecommons.org/licenses/by/4.0/deed.ja).
