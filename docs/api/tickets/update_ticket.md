# Update Ticket

**URL** : `api/v1/ticketing/tickets/{id}`

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
	"id": 8,
    "summary": "My printer won't print.",
    "description": "My printer won't print.",
    "due_date": "2023-12-30",
    "status_id": 2,
    "department_id": 1,
    "topic_id": 2,
    "sla_id": 2,
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
    "message": {"summary":["The summary field is required."]},
    "data": []
}
```

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": 200,
    "message": "Succesfully update ticket",
    "data": []
}
```
