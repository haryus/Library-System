# Create Topic Reference

**URL** : `api/v1/references/topics/store`

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
	"name": "Access Issue",
    "description": "Access Issue",
    "sort": 4,
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
    "message": {"name":["The name field is required."]},
    "data": []
}
```

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": 200,
    "message": "Succesfully added topic reference",
    "data": []
}
```
