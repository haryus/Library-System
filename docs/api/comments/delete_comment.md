# Delete Comment

**URL** : `api/v1/commenting/comments/{id}`

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
	"id" : 8,
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
    "message": "Comment has been Deleted!"
}
```