# Get Ticket

**URL** : `api/v1/ticketing/tickets/get-tickets`

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
    "draw": 0,
    "recordsTotal": 1,
    "recordsFiltered": 1,
    "data": [
        {
            "id": 8,
            "number": "ADM140001",
            "summary": "My printer won't print.",
            "description": "My printer won't print.",
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
    ],
    "queries": [
        {
            "query": "select count(*) as aggregate from `tickets` where `application_id` = ? and `tickets`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 2.72
        },
        {
            "query": "select * from `tickets` where `application_id` = ? and `tickets`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 1.1
        }
    ],
    "input": []
}
```
