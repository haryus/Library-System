# Get Topic Reference

**URL** : `api/v1/references/statuses/get-statuses`

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
            "name": "Access Issue",
            "description": "Access Issue",
            "sort": 4,
            "application_id": "2758c24b-da33-4693-8a54-1215c20d042c",
            "deleted_at": null
        }
    ],
    "queries": [
        {
            "query": "select count(*) as aggregate from `topics` where `application_id` = ? and `topics`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 3.03
        },
        {
            "query": "select * from `topics` where `application_id` = ? and `topics`.`deleted_at` is null",
            "bindings": [
                "2758c24b-da33-4693-8a54-1215c20d042c"
            ],
            "time": 0.71
        }
    ],
    "input": []
}
```
