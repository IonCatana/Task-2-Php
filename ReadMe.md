Write a function that provides change directory (cd) function for an abstract filesystem.

Notes:
- root path is '/'.
- path separator is '/'.
- parent directory is addressable as '..'.
- directory names consist only of English alphabet letters (A-Z and a-z).
- the function will not be passed any invalid paths.
- do not use built-in path-related functions.

For example:
$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->currentPath;
should display '/a/b/c/x'.