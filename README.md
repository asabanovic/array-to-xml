# Array to XML Feed
This is a custom php script used to map a PHP array to an XML Feed.

There are two examples of XML feeds and inside there are additional examples of tag types that you can create with the script.

### Example One

```sh
'tag-1' => [
 	['tag-1-child' => 'value 1'],
 	['tag-2-child' => 'value 2'],
 	['tag-3-child' => 'value 3'],
 	['tag-4-child' => 'value 4']
 ]
```

maps to 

```sh
<tag-1>
    <tag-1-child>value 1</tag-1-child>
</tag-1>
<tag-1>
    <tag-2-child>value 2</tag-2-child>
</tag-1>
<tag-1>
    <tag-3-child>value 3</tag-3-child>
</tag-1>
<tag-1>
    <tag-4-child>value 4</tag-4-child>
</tag-1>
```
 

### Example Two

```sh
'?' => [
 	'picture' => [
 		'jpg',
 		'png',
 		'gif'
 	]
 ]
```

maps to 

```sh
<picture>jpg</picture>
<picture>png</picture>
<picture>gif</picture>
```

### Example Three

```sh
'newElement*param1*value1*param2*value2*param3*value3*param4*value4' => [
 	'post1',
 	'post2',
 	'post3',
 	'post4'
]
```

maps to 

```sh
<newElement param1="value1" param2="value2" param3="value3" param4="value4">post1</newElement>
<newElement param1="value1" param2="value2" param3="value3" param4="value4">post2</newElement>
<newElement param1="value1" param2="value2" param3="value3" param4="value4">post3</newElement>
<newElement param1="value1" param2="value2" param3="value3" param4="value4">post4</newElement>
```

There is no limitation on how deep the array goes. 