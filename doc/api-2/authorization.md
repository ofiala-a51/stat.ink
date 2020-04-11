Authorization
=============

If stat.ink requires API access authorization, you need to use the following methods.

  - Use the API key assigned to each user. (This API key is the same as v1 API)

  - Use the `Authorization: Bearer` HTTP header.


Get API key
-------------

The stat.ink web application issues an API key to each user when registering for membership on the website.

This API key can be displayed from each user's profile setting screen.

Each application cooperates by having the user input this API key.

The API key is `/ ^ [0-9A-Za-z _-] {43} $ /`.
(Base64 `+` `/` is replaced with `-`` _` and equals 43 characters without `=`)


Submit request
----------------

When accessing an API endpoint that requires authorization (for example, battle posting), the Bearer scheme was used as follows:
You need to add an Authorization header to make the request.

Example: (API key = `sD093VHLHW41b9xdaM7zVpyIX2TbIornR0h47RaUNGA`)
```
POST / api / v2 / endpoint HTTP / 1.1
Host: stat.ink
Authorization: Bearer sD093VHLHW41b9xdaM7zVpyIX2TbIornR0h47RaUNGA
Content-Type: application / json
Content-Length: 42

...
```
