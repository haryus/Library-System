# Assign Ticket

**URL** : `api/v1/ticketing/tickets/get-assign/{id}`

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
    "assigned_to": "2758c24b-da33-4693-8a54-1215c20d042c",
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
    "users": [],
    "departments": [
        {
            "id": 5,
            "name": "harry",
            "prefix": "HAR",
            "user_id": "3108ae5d-54c8-43a9-9c47-e5af24ef0e9f",
            "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
            "deleted_at": null
        }
    ],
    "tickets": {
        "id": 8,
        "number": "ADM140001",
        "summary": "shet",
        "description": "test123",
        "due_date": "2023-12-30",
        "created_by": null,
        "assigned_to": null,
        "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
        "status_id": 2,
        "department_id": 1,
        "topic_id": 2,
        "sla_id": 2,
        "reopened_at": null,
        "closed_at": null,
        "updated_at": "2023-12-14T06:58:43.000000Z",
        "deleted_at": null
    }
}
```
