# Get SLA Reference

**URL** : `api/v1/references/slas/get-slas`

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
            "id": 1,
            "name": "Informational",
            "grace_period": 48,
            "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
            "deleted_at": null
        }
    ],
    "queries": [
        {
            "query": "select count(*) as aggregate from `slas` where `application_id` = ? and `slas`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 4.46
        },
        {
            "query": "select * from `slas` where `application_id` = ? and `slas`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 0.83
        }
    ],
    "input": []
}
```
