# Asserts


Special module for using asserts in your tests.

## Codeception Asserts

### assertFileNotExists

Asserts that a file does not exist.

 * `param string` $filename
 * `param string` $message


### assertGreaterOrEquals

Asserts that a value is greater than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertIsEmpty

Asserts that a variable is empty.

 * `param` $actual
 * `param string` $message


### assertLessOrEquals

Asserts that a value is smaller than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotRegExp

Asserts that a string does not match a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message


### assertRegExp

Asserts that a string matches a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message


### assertThatItsNot

Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param` $value
 * `param Constraint` $constraint
 * `param string` $message


### expectException

Handles and checks exception called inside callback function.
Either exception class name or exception instance should be provided.

```php
<?php
$I->expectException(MyException::class, function() {
    $this->doSomethingBad();
});

$I->expectException(new MyException(), function() {
    $this->doSomethingBad();
});
```
If you want to check message or exception code, you can pass them with exception instance:
```php
<?php
// will check that exception MyException is thrown with "Don't do bad things" message
$I->expectException(new MyException("Don't do bad things"), function() {
    $this->doSomethingBad();
});
```
 * `deprecated` Use expectThrowable() instead
 * `param Exception|string` $exception
 * `param callable` $callback


### expectThrowable

Handles and checks throwables (Exceptions/Errors) called inside the callback function.
Either throwable class name or throwable instance should be provided.

```php
<?php
$I->expectThrowable(MyThrowable::class, function() {
    $this->doSomethingBad();
});

$I->expectThrowable(new MyException(), function() {
    $this->doSomethingBad();
});
```
If you want to check message or throwable code, you can pass them with throwable instance:
```php
<?php
// will check that throwable MyError is thrown with "Don't do bad things" message
$I->expectThrowable(new MyError("Don't do bad things"), function() {
    $this->doSomethingBad();
});
```

* `param Throwable|string` $throwable
* `param callable` $callback


### checkThrowable

Check if the given throwable matches the expected data,
fail (throws an exception) if it does not.

* `param Throwable` $throwable
* `param string` $expectedClass
* `param string` $expectedMsg
* `param int` $expectedCode

## PHPUnit Asserts

### assertArrayHasKey

Asserts that an array has a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array
 * `param string` $message


### assertArrayNotHasKey

Asserts that an array does not have a specified key.

 * `param int|string` $key
 * `param array|ArrayAccess` $array
 * `param string` $message


### assertClassHasAttribute

Asserts that a class has a specified attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message


### assertClassHasStaticAttribute

Asserts that a class has a specified static attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message


### assertClassNotHasAttribute

Asserts that a class does not have a specified attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message


### assertClassNotHasStaticAttribute

Asserts that a class does not have a specified static attribute.

 * `param string` $attributeName
 * `param string` $className
 * `param string` $message


### assertContains

Asserts that a haystack contains a needle.

 * `param` $needle
 * `param` $haystack
 * `param string` $message


### assertContainsEquals

__not documented yet__

 * `param` $needle
 * `param` $haystack
 * `param string` $message


### assertContainsOnly

Asserts that a haystack contains only values of a given type.

 * `param string` $type
 * `param` $haystack
 * `param bool|null` $isNativeType
 * `param string` $message


### assertContainsOnlyInstancesOf

Asserts that a haystack contains only instances of a given class name.

 * `param string` $className
 * `param` $haystack
 * `param string` $message


### assertCount

Asserts the number of elements of an array, Countable or Traversable.

 * `param int` $expectedCount
 * `param Countable|iterable` $haystack
 * `param string` $message


### assertDirectoryDoesNotExist

Asserts that a directory does not exist.

 * `param string` $directory
 * `param string` $message


### assertDirectoryExists

__not documented yet__

 * `param string` $directory
 * `param string` $message


### assertDirectoryIsNotReadable

Asserts that a directory exists and is not readable.

 * `param string` $directory
 * `param string` $message


### assertDirectoryIsNotWritable

Asserts that a directory exists and is not writable.

 * `param string` $directory
 * `param string` $message


### assertDirectoryIsReadable

Asserts that a directory exists and is readable.

 * `param string` $directory
 * `param string` $message


### assertDirectoryIsWritable

Asserts that a directory exists and is writable.

 * `param string` $directory
 * `param string` $message


### assertDoesNotMatchRegularExpression

Asserts that a string does not match a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message


### assertEmpty

Asserts that a variable is empty.

 * `param` $actual
 * `param string` $message


### assertEquals

Asserts that two variables are equal.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertEqualsCanonicalizing

Asserts that two variables are equal (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertEqualsIgnoringCase

Asserts that two variables are equal (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertEqualsWithDelta

Asserts that two variables are equal (with delta).

 * `param` $expected
 * `param` $actual
 * `param float` $delta
 * `param string` $message


### assertFalse

Asserts that a condition is false.

 * `param` $condition
 * `param string` $message


### assertFileDoesNotExist

Asserts that a file does not exist.

 * `param string` $filename
 * `param string` $message


### assertFileEquals

Asserts that the contents of one file is equal to the contents of another file.

 * `param string` $expected
 * `param string` $actual
 * `param string` $message


### assertFileEqualsCanonicalizing

Asserts that the contents of one file is equal to the contents of another file (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertFileEqualsIgnoringCase

Asserts that the contents of one file is equal to the contents of another file (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertFileExists

Asserts that a file exists.

 * `param string` $filename
 * `param string` $message


### assertFileIsNotReadable

Asserts that a file exists and is not readable.

 * `param string` $file
 * `param string` $message


### assertFileIsNotWritable

Asserts that a file exists and is not writable.

 * `param string` $file
 * `param string` $message


### assertFileIsReadable

Asserts that a file exists and is readable.

 * `param string` $file
 * `param string` $message


### assertFileIsWritable

Asserts that a file exists and is writable.

 * `param string` $file
 * `param string` $message


### assertFileNotEquals

Asserts that the contents of one file is not equal to the contents of another file.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertFileNotEqualsCanonicalizing

Asserts that the contents of one file is not equal to the contents of another file (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertFileNotEqualsIgnoringCase

Asserts that the contents of one file is not equal to the contents of another file (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertFinite

Asserts that a variable is finite.

 * `param` $actual
 * `param string` $message


### assertGreaterThan

Asserts that a value is greater than another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertGreaterThanOrEqual

Asserts that a value is greater than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertInfinite

Asserts that a variable is infinite.

 * `param` $actual
 * `param string` $message


### assertInstanceOf

Asserts that a variable is of a given type.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertIsArray

Asserts that a variable is of type array.

 * `param` $actual
 * `param string` $message


### assertIsBool

Asserts that a variable is of type bool.

 * `param` $actual
 * `param string` $message


### assertIsCallable

Asserts that a variable is of type callable.

 * `param` $actual
 * `param string` $message


### assertIsClosedResource

Asserts that a variable is of type resource and is closed.

 * `param` $actual
 * `param string` $message


### assertIsFloat

Asserts that a variable is of type float.

 * `param` $actual
 * `param string` $message


### assertIsInt

Asserts that a variable is of type int.

 * `param` $actual
 * `param string` $message


### assertIsIterable

Asserts that a variable is of type iterable.

 * `param` $actual
 * `param string` $message


### assertIsNotArray

Asserts that a variable is not of type array.

 * `param` $actual
 * `param string` $message


### assertIsNotBool

Asserts that a variable is not of type bool.

 * `param` $actual
 * `param string` $message


### assertIsNotCallable

Asserts that a variable is not of type callable.

 * `param` $actual
 * `param string` $message


### assertIsNotClosedResource

Asserts that a variable is not of type resource.

 * `param` $actual
 * `param string` $message


### assertIsNotFloat

Asserts that a variable is not of type float.

 * `param` $actual
 * `param string` $message


### assertIsNotInt

Asserts that a variable is not of type int.

 * `param` $actual
 * `param string` $message


### assertIsNotIterable

Asserts that a variable is not of type iterable.

 * `param` $actual
 * `param string` $message


### assertIsNotNumeric

Asserts that a variable is not of type numeric.

 * `param` $actual
 * `param string` $message


### assertIsNotObject

Asserts that a variable is not of type object.

 * `param` $actual
 * `param string` $message


### assertIsNotReadable

Asserts that a file/dir exists and is not readable.

 * `param string` $filename
 * `param string` $message


### assertIsNotResource

Asserts that a variable is not of type resource.

 * `param` $actual
 * `param string` $message


### assertIsNotScalar

Asserts that a variable is not of type scalar.

 * `param` $actual
 * `param string` $message


### assertIsNotString

Asserts that a variable is not of type string.

 * `param` $actual
 * `param string` $message


### assertIsNotWritable

Asserts that a file/dir exists and is not writable.

 * `param` $filename
 * `param string` $message


### assertIsNumeric

Asserts that a variable is of type numeric.

 * `param` $actual
 * `param string` $message


### assertIsObject

Asserts that a variable is of type object.

 * `param` $actual
 * `param string` $message


### assertIsReadable

Asserts that a file/dir is readable.

 * `param` $filename
 * `param string` $message


### assertIsResource

Asserts that a variable is of type resource.

 * `param` $actual
 * `param string` $message


### assertIsScalar

Asserts that a variable is of type scalar.

 * `param` $actual
 * `param string` $message


### assertIsString

Asserts that a variable is of type string.

 * `param` $actual
 * `param string` $message


### assertIsWritable

Asserts that a file/dir exists and is writable.

 * `param` $filename
 * `param string` $message


### assertJson

Asserts that a string is a valid JSON string.

 * `param string` $actualJson
 * `param string` $message


### assertJsonFileEqualsJsonFile

Asserts that two JSON files are equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message


### assertJsonFileNotEqualsJsonFile

Asserts that two JSON files are not equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message


### assertJsonStringEqualsJsonFile

Asserts that the generated JSON encoded object and the content of the given file are equal.

 * `param string` $expectedFile
 * `param string` $actualJson
 * `param string` $message


### assertJsonStringEqualsJsonString

Asserts that two given JSON encoded objects or arrays are equal.

 * `param string` $expectedJson
 * `param string` $actualJson
 * `param string` $message


### assertJsonStringNotEqualsJsonFile

Asserts that the generated JSON encoded object and the content of the given file are not equal.

 * `param string` $expectedFile
 * `param string` $actualJson
 * `param string` $message


### assertJsonStringNotEqualsJsonString

Asserts that two given JSON encoded objects or arrays are not equal.

 * `param string` $expectedJson
 * `param string` $actualJson
 * `param string` $message


### assertLessThan

Asserts that a value is smaller than another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertLessThanOrEqual

Asserts that a value is smaller than or equal to another value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertMatchesRegularExpression

Asserts that a string matches a given regular expression.

 * `param string` $pattern
 * `param string` $string
 * `param string` $message


### assertNan

Asserts that a variable is nan.

 * `param` $actual
 * `param string` $message


### assertNotContains

Asserts that a haystack does not contain a needle.

 * `param` $needle
 * `param` $haystack
 * `param string` $message

### assertNotContains

__not documented yet__


### assertNotContainsOnly

Asserts that a haystack does not contain only values of a given type.

 * `param string` $type
 * `param` $haystack
 * `param bool|null` $isNativeType
 * `param string` $message


### assertNotCount

Asserts the number of elements of an array, Countable or Traversable.

 * `param int` $expectedCount
 * `param Countable|iterable` $haystack
 * `param string` $message


### assertNotEmpty

Asserts that a variable is not empty.

 * `param` $actual
 * `param string` $message


### assertNotEquals

Asserts that two variables are not equal.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotEqualsCanonicalizing

Asserts that two variables are not equal (canonicalizing).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotEqualsIgnoringCase

Asserts that two variables are not equal (ignoring case).

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotEqualsWithDelta

Asserts that two variables are not equal (with delta).

 * `param` $expected
 * `param` $actual
 * `param float` $delta
 * `param string` $message


### assertNotFalse

Asserts that a condition is not false.

 * `param` $condition
 * `param string` $message


### assertNotInstanceOf

Asserts that a variable is not of a given type.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotNull

Asserts that a variable is not null.

 * `param` $actual
 * `param string` $message


### assertNotSame

Asserts that two variables do not have the same type and value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertNotSameSize

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual
 * `param string` $message


### assertNotTrue

Asserts that a condition is not true.

 * `param` $condition
 * `param string` $message


### assertNull

Asserts that a variable is null.

 * `param` $actual
 * `param string` $message


### assertObjectHasAttribute

Asserts that an object has a specified attribute.

 * `param string` $attributeName
 * `param object` $object
 * `param string` $message


### assertObjectNotHasAttribute

Asserts that an object does not have a specified attribute.

 * `param string` $attributeName
 * `param object` $object
 * `param string` $message


### assertSame

Asserts that two variables have the same type and value.

 * `param` $expected
 * `param` $actual
 * `param string` $message


### assertSameSize

Assert that the size of two arrays (or `Countable` or `Traversable` objects) is the same.

 * `param Countable|iterable` $expected
 * `param Countable|iterable` $actual
 * `param string` $message


### assertStringContainsString

__not documented yet__

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message

### assertStringContainsStringIgnoringCase

__not documented yet__

### assertStringEndsNotWith

Asserts that a string ends not with a given suffix.

 * `param string` $suffix
 * `param string` $string
 * `param string` $message


### assertStringEndsWith

Asserts that a string ends with a given suffix.

 * `param string` $suffix
 * `param string` $string
 * `param string` $message


### assertStringEqualsFile

Asserts that the contents of a string is equal to the contents of a file.

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringEqualsFileCanonicalizing

Asserts that the contents of a string is equal to the contents of a file (canonicalizing).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringEqualsFileIgnoringCase

Asserts that the contents of a string is equal to the contents of a file (ignoring case).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringMatchesFormat

Asserts that a string matches a given format string.

 * `param string` $format
 * `param string` $string
 * `param string` $message


### assertStringMatchesFormatFile

Asserts that a string matches a given format file.

 * `param string` $formatFile
 * `param string` $string
 * `param string` $message


### assertStringNotContainsString

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message


### assertStringNotContainsStringIgnoringCase

 * `param string` $needle
 * `param string` $haystack
 * `param string` $message


### assertStringNotEqualsFile

Asserts that the contents of a string is not equal to the contents of a file.

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringNotEqualsFileCanonicalizing

Asserts that the contents of a string is not equal to the contents of a file (canonicalizing).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringNotEqualsFileIgnoringCase

Asserts that the contents of a string is not equal to the contents of a file (ignoring case).

 * `param string` $expectedFile
 * `param string` $actualString
 * `param string` $message


### assertStringNotMatchesFormat

Asserts that a string does not match a given format string.

 * `param string` $format
 * `param string` $string
 * `param string` $message


### assertStringNotMatchesFormatFile

Asserts that a string does not match a given format string.

 * `param string` $formatFile
 * `param string` $string
 * `param string` $message


### assertStringStartsNotWith

Asserts that a string starts not with a given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message


### assertStringStartsWith

Asserts that a string starts with a given prefix.

 * `param string` $prefix
 * `param string` $string
 * `param string` $message


### assertThat

Evaluates a PHPUnit\Framework\Constraint matcher object.

 * `param` $value
 * `param Constraint` $constraint
 * `param string` $message


### assertTrue

Asserts that a condition is true.

 * `param` $condition
 * `param string` $message


### assertXmlFileEqualsXmlFile

Asserts that two XML files are equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message


### assertXmlFileNotEqualsXmlFile

Asserts that two XML files are not equal.

 * `param string` $expectedFile
 * `param string` $actualFile
 * `param string` $message


### assertXmlStringEqualsXmlFile

Asserts that two XML documents are equal.

 * `param string` $expectedFile
 * `param DOMDocument|string` $actualXml
 * `param string` $message


### assertXmlStringEqualsXmlString

Asserts that two XML documents are equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml
 * `param string` $message


### assertXmlStringNotEqualsXmlFile

Asserts that two XML documents are not equal.

 * `param string` $expectedFile
 * `param DOMDocument|string` $actualXml
 * `param string` $message


### assertXmlStringNotEqualsXmlString

Asserts that two XML documents are not equal.

 * `param DOMDocument|string` $expectedXml
 * `param DOMDocument|string` $actualXml
 * `param string` $message


### fail

Fails a test with the given message.

 * `param string` $message


### markTestIncomplete

Mark the test as incomplete.

 * `param string` $message


### markTestSkipped

Mark the test as skipped.

 * `param string` $message


<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-asserts/tree/master/src/Codeception/Module/Asserts.php">Help us to improve documentation. Edit module reference</a></div>
