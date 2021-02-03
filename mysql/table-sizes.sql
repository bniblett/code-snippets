SELECT
  table_name AS "Table",
  ROUND(data_length / 1024 / 1024, 2) AS "Data Size",
  ROUND(index_length / 1024 / 1024, 2) AS "Index Length",
  ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS "Total Size (MB)"
FROM
  information_schema.TABLES
WHERE
  table_schema = "database_name" /* Insert Table Name */
ORDER BY
  (data_length + index_length) DESC;