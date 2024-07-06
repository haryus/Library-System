# Update SLA Reference

**URL** : `api/v1/references/slas/{id}`

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
    "name": "Informational",
    "grace_period": 48,
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
    "message": {"grace_period":["The grace period must be an integer.",
                "The grace period field is required."]},
    "data": []
}
```

## Success Response
**Code**: `200`

**Sample Response**
```json
{
    "status": 200,
    "message": "Succesfully update sla reference",
    "data": []
}
```
