DashboardApiPHP
===============

Api for Dashboard app


## Api path

`/api/{version}/`

### versions

| version | comment          |
|---------|------------------|
| dev     | current dev      |
| stable  | current stable   |
| X.X     | specific version |


## Api Actions

| path                             | method | comment          |
|----------------------------------|--------|------------------|
| /template/list/                  | GET    |                  |
| /template/{id}/name/             | GET    |                  | 
| /template/                       | POST   | new tmp          |
| /template/{id}/item/list/        | GET    |                  |
| /template/{id}/item/list/        | POST   | update tmp items |
| /template/{id}/item/             | POST   | new tmp item     |
| /template/{id}/item/{id}/delete/ | POST   |                  |
