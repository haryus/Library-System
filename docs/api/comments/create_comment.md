# Create Comment

**URL** : `api/v1/commenting/comments/store`

**Method** : `POST`

**Header Requirements**
```json
{
    "Content-Type": "application/json",
    "Accept": "application/json",
    "app_key": "{Application Key}",
    "app_ïd": "{Application ID}"
}
```

**Sample Request**
```array
{
    "comment": "<p>testing</p>",
    "ticket_id": 8,
}
```

## Error Response


**Code**: `401`

**Response**
```json
{
    "status": 401,
    "message": "Unauthorized Request!",
    "data": []
}
```

**Code**: `422`

**Response**
```json
{
    "status": 422,
    "message": {"comment":["The comment field is required."]},
    "data": []
}
```

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": 200,
    "message": "Succesfully added comment",
    "data": []
}
```
