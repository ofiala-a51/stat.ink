Request Body
============

How to throw Content-Body to stat.ink by `POST`,` PUT`, or `PATCH`.

Overview
----

Accepts a Content Body in one of the following formats:

| Format | `Content-Type` ||
|-|-|-|
| JSON | `application / json` | Recommended for apps that do not send binary data |
| Message Pack | `application / x-msgpack` | Recommended for apps that send binary data |
| URL Encoded | `application / x-www-form-urlencoded` | Deprecated |
| Multipart Form-data | `multipart / form-data` | Deprecated |

Regarding deprecated formats, the transmission method is not described in this specification.


It also accepts Content Body encoded in the following format:

| Format | `Content-Encoding` ||
|-|-|-|
| (raw data) | none | raw data |
| (raw data) | `identity` | Raw data |
| Gzip | `gzip` | Gzip compressed data |


`Content-Type: application / json`
--------------------------------

- Set the structure described in the endpoint specification as it is to a JSON object and send it.

- When the parameter is an integer value, there is no problem if it is sent as a string (`{" level ":" 10 "}` is "reasonable")

- Be sure to send the specified string when the parameter looks like a boolean. (`True` and` false` are not accepted)

- Binary data (such as images) cannot be included in the message.

Example:

```
POST / api / v2 / endpoint HTTP / 1.1
Host: stat.ink
Authorization: Bearer APIKEYAPIKEYAPIKEYAPIKEY
Content-Type: application / json
Content-Encoding: identity
Content-Length: ***

{"key1": "value1", "key2": 42, ..}
```

`Content-Type: application / x-msgpack`
--------------------------------

- Set the structure described in the endpoint specification as it is in the MessagePack object and send it.

- When the parameter is an integer value, there is no problem if it is sent as a string (`{" level ":" 10 "}` is "reasonable")

- Be sure to send the specified string when the parameter looks like a boolean. (`True` and` false` are not accepted)

- Binary data (such as images) can be included in the transmitted data (only if allowed by the endpoint specification)

Example:

```
POST / api / v2 / endpoint HTTP / 1.1
Host: stat.ink
Authorization: Bearer APIKEYAPIKEYAPIKEYAPIKEY
Content-Type: application / x-msgpack
Content-Encoding: identity
Content-Length: ***

(MessagePack binary)
```

`Content-Encoding: gzip`
------------------------

When sending to stat.ink, JSON / MsgPack data can be sent after compressing with gzip if necessary.

When data is large such as when event data is included, a reasonable compression ratio can be obtained,
The compression ratio as expected is not obtained when images are included, so it is highly likely that the expected effect cannot be obtained as a whole.

Example:

```
POST / api / v2 / endpoint HTTP / 1.1
Host: stat.ink
Authorization: Bearer APIKEYAPIKEYAPIKEYAPIKEY
Content-Type: application / x-msgpack
Content-Encoding: gzip
Content-Length: [length (gzip (msgpack (data)]]

[gzip (msgpack (data))]
```

Difference from V1
---------

- It is almost the same except that the general form when sending is deprecated.

----

[! [CC-BY 4.0] (https://stat.ink/static-assets/cc/cc-by.svg)] (http://creativecommons.org/licenses/by/4.0/deed.ja)

This text is licensed under [Creative Commons-Attribution 4.0 International] (http://creativecommons.org/licenses/by/4.0/deed.ja).
