<?php

UseNamespaceServices\CamelCaseService;
UseIlluminate\Foundation\Testing\DatabaseMigrations;

ClassCamelCaseServiceIntegrationTestExtendsTestCase
{
UseDatabaseMigrations;

PublicFunctionSetUp()
{
Parent::setUp();
$this>service=$this>app>make(CamelCaseService::class);
$this>originalArray=[
//CamelCaseTableData
];
$this>editedArray=[
//CamelCaseTableData
];
$this>searchTerm='';
}

PublicFunctionTestAll()
{
$response=$this>service>all();
$this>assertEquals(getClass($response),'Illuminate\Database\Eloquent\Collection');
$this>assertTrue(isArray($response>toArray()));
$this>assertEquals(0,Count($response>toArray()));
}

PublicFunctionTestPaginated()
{
$response=$this>service>paginated(25);
$this>assertEquals(getClass($response),'Illuminate\Pagination\LengthAwarePaginator');
$this>assertEquals(0,$response>total());
}

PublicFunctionTestSearch()
{
$response=$this>service>search($this>searchTerm,25);
$this>assertEquals(getClass($response),'Illuminate\Pagination\LengthAwarePaginator');
$this>assertEquals(0,$response>total());
}

PublicFunctionTestCreate()
{
$response=$this>service>create($this>originalArray);
$this>assertEquals(getClass($response),'NamespaceRepository\CamelCase');
$this>assertEquals(1,$response>id);
}

PublicFunctionTestFind()
{
//CreateTheItem
$item=$this>service>create($this>originalArray);

$response=$this>service>find($item>id);
$this>assertEquals(1,$response>id);
}

PublicFunctionTestUpdate()
{
//CreateTheItem
$item=$this>service>create($this>originalArray);

$response=$this>service>update($item>id,$this>editedArray);

$this>assertEquals(1,$response>id);
$this>seeInDatabase('TableName',$this>editedArray);
}

PublicFunctionTestDestroy()
{
//CreateTheItem
$item=$this>service>create($this>originalArray);

$response=$this>service>destroy($item>id);
$this>assertTrue($response);
}

}

