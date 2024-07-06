# New Form for Creating Ticket

**URL** : `api/v1/ticketing/tickets/create`

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
    "status": 200,
    "message": "Successfully",
    "data": {
        "statuses": [
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
        ],
        "topics": [
            {
                "id": 1,
                "name": "Access Issue",
                "description": "Access Issue",
                "sort": 4,
                "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
                "deleted_at": null
            }
        ],
        "slas": [
            {
                "id": 1,
                "name": "Informational",
                "grace_period": 48,
                "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
                "deleted_at": null
            }
        ],
        "departments": [
            {
                "id": 5,
                "name": "Admin",
                "prefix": "ADM",
                "user_id": "3108ae5d-54c8-43a9-9c47-e5af24ef0e9f",
                "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
                "deleted_at": null
            }
        ],
        "users": [],
        "ticketFiles": [],
        "existingFiles": []
    }
}
```
