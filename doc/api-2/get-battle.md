`GET / api / v2 / battle`,` GET / api / v2 / user-battle`
===============================================

| | `/ api / v2 / battle` |` / api / v2 / user-battle` |
|-|-|-|
| URL | `https: // stat.ink / api / v2 / battle` |` https: // stat.ink / api / v2 / user-battle` |
| Return-Type | `application / json` |` application / json` |
| Authentication | None | [Required] (authorization.md) |


Returns a list of battle information in JSON format, as an array of [`battle` structure] (struct / battle.md).

If `only = splatnet_number` is specified, return as an array of numbers.

This API is quite heavy, so hit it with moderate frequency.



Query parameters
----------------

| Parameter name | type | contents |
| ------------ |-| ---- |
| `screen_name` | string | Search only for data for the specified user. If not specified, search for all users. <br> `user-battle` does not support this parameter. |
| `newer_than` | Number | Search for battles newer than the specified battle ID. It does not include the specified number itself. |
| `older_than` | Number | Search for battles older than the specified battle ID. It does not include the specified number itself. |
| `count` | Numeric value (1-50) | Search with the specified number as the upper limit. <br> When `only = splatnet_number` is specified, the limit is 1000. |
| `order` | Specified string |` asc`: Posts are displayed in chronological order. <br> `desc`: Displays posts in reverse chronological order. <br> `splatnet_asc`: Display the squid rings 2 in ascending order. <br> `splatnet_desc`: Display the squid rings 2 in ascending order. <br> The default is `desc`. However, the behavior changes with `only`. |
| `only` | Specified string |` splatnet_number`: Returns only the identification number of squid ring 2. |


About `user-battle`
----------------------

Using `user-battle` returns information about the authenticated user in the` Authorization` header.

This allows you to respond when you want to get your information, but you know the API key but do not know the `screen_name`.


About `only = splatnet_number`
-------------------------------

If you specify `only = splatnet_number`, the status will be as follows.

  -Returns an array containing only the battle numbers for Squid Ring 2.
  -Battles where the battle number of Squid Ring 2 is not specified will be ignored.
  -`order` default changes to` splatnet_desc`. (Can be overwritten)


----

[! [CC-BY 4.0] (https://stat.ink/static-assets/cc/cc-by.svg)] (http://creativecommons.org/licenses/by/4.0/deed.ja)

This text is licensed under [Creative Commons-Attribution 4.0 International] (http://creativecommons.org/licenses/by/4.0/deed.ja).
