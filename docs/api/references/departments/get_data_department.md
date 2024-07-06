# Get Department Reference

**URL** : `api/v1/references/departments/get-departments`

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
            "id": 5,
            "name": "Admin",
            "prefix": "ADM",
            "user_id": "3108ae5d-54c8-43a9-9c47-e5af24ef0e9f",
            "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
            "deleted_at": null
        }
    ],
    "queries": [
        {
            "query": "select count(*) as aggregate from `departments` where `application_id` = ? and `departments`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 6.63
        },
        {
            "query": "select * from `departments` where `application_id` = ? and `departments`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 1.11
        }
    ],
    "input": []
}
```
