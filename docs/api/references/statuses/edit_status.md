# Edit Status Reference

**URL** : `api/v1/references/departments/edit/{id}`

**Method** : `GET`

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
	"id": 1,
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
    "id": 1,
    "name": "New",
    "description": "New",
    "state": "Active",
    "sort": 1,
    "allowreopen": "1",
    "application_user": null,
    "application_id": "1",
    "deleted_at": null
}
```
