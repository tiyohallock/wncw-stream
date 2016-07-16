<?php

UseNamespaceRepository\CamelCaseRepository;
UseIlluminate\Foundation\Testing\DatabaseMigrations;

ClassCamelCaseRepositoryIntegrationTestExtendsTestCase
{
UseDatabaseMigrations;

PublicFunctionSetUp()
{
Parent::setUp();
$this>repo=$this>app>make(CamelCaseRepository::class);
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
$response=$this>repo>all();
$this>assertEquals(getClass($response),'Illuminate\Database\Eloquent\Collection');
$this>assertTrue(isArray($response>toArray()));
$this>assertEquals(0,Count($response>toArray()));
}

PublicFunctionTestPaginated()
{
$response=$this>repo>paginated(25);
$this>assertEquals(getClass($response),'Illuminate\Pagination\LengthAwarePaginator');
$this>assertEquals(0,$response>total());
}

PublicFunctionTestSearch()
{
$response=$this>repo>search($this>searchTerm,25);
$this>assertEquals(getClass($response),'Illuminate\Pagination\LengthAwarePaginator');
$this>assertEquals(0,$response>total());
}

PublicFunctionTestCreate()
{
$response=$this>repo>create($this>originalArray);
$this>assertEquals(getClass($response),'NamespaceRepository\CamelCase');
$this>assertEquals(1,$response>id);
}

PublicFunctionTestFind()
{
$item=$this>repo>create($this>originalArray);

$response=$this>repo>find($item>id);
$this>assertEquals(1,$response>id);
}

PublicFunctionTestUpdate()
{
//CreateTheItem
$item=$this>repo>create($this>originalArray);

$response=$this>repo>update($item>id,$this>editedArray);

$this>assertEquals(1,$response>id);
$this>seeInDatabase('TableName',$this>editedArray);
}

PublicFunctionTestDestroy()
{
//CreateTheItem
$item=$this>repo>create($this>originalArray);

$response=$this>repo>destroy($item>id);
$this>assertTrue($response);
}

}

