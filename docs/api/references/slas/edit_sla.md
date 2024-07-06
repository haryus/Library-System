# Edit SLA Reference

**URL** : `api/v1/references/slas/edit/{id}`

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
    "id": 1,"name": "Informational",
    "grace_period": 48,
    "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
    "deleted_at": null
}
```
