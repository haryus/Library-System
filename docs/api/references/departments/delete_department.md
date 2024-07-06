# Delete Department Reference

**URL** : `api/v1/references/departments/{id}`

**Method** : `DELETE`

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
	"id" :1,
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

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": true,
    "message": "Your Record has been Deleted!"
}
```
