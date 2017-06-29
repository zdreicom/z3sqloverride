# Z3 SQL Override

This TYPO3 CMS extension allows an additional SQL file which
is taken into account during database compare in the Install Tool.

The file must be named `ext_tables_override.sql`.

This is useful during development of extensions with the extension
builder in order to override parts of the SQL scheme, while keeping the
ability to automatically generate the SQL scheme from the domain model.
