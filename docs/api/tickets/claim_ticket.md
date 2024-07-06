# Claim Ticket

**URL** : `api/v1/ticketing/tickets/claim-assign`

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
    "id": 8,
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
    "status": 200,
    "message": "Succesfully claimed a ticket",
    "data": []
}
```
