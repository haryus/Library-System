# Update Department Reference

**URL** : `api/v1/references/departments/{id}`

**Method** : `PATCH`

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
	"id" :"1",
	"name" :"Information Technology",
	"prefix": "IT",
	"user_id": "9ffb5c66-ccf4-434f-850b-6805c6f4f706",
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
    "message": {"prefix":["The prefix field is required."]},
    "data": []
}
```

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": 200,
    "message": "Succesfully update department reference",
    "data": []
}
```
