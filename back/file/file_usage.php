<?php

// @code http://dropbucket.org/node/257

/*
SELECT fm.*
FROM file_managed AS fm
LEFT OUTER JOIN file_usage AS fu ON ( fm.fid = fu.fid )
LEFT OUTER JOIN node AS n ON ( fu.id = n.nid )
WHERE (fu.TYPE = 'node' OR fu.TYPE IS NULL) AND n.nid IS NULL
*/
