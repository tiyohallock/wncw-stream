<?php

UseIlluminate\Foundation\Testing\WithoutMiddleware;
UseIlluminate\Foundation\Testing\DatabaseMigrations;

ClassCamelCaseAcceptanceTestExtendsTestCase
{
UseDatabaseMigrations;
UseWithoutMiddleware;

PublicFunctionSetUp()
{
Parent::setUp();

$this>LowerCase=Factory(NamespaceRepository\CamelCase::class)>make([
//CamelCaseTableData
]);
$this>LowerCaseEdited=Factory(NamespaceRepository\CamelCase::class)>make([
//CamelCaseTableData
]);
$user=Factory(AppNamespaceRepositories\User\User::class)>make();
$this>actor=$this>actingAs($user);
}

PublicFunctionTestIndex()
{
$response=$this>actor>call('GET','SectionRoutePrefixLowerCasePlural');
$this>assertEquals(200,$response>getStatusCode());
$this>assertViewHas('LowerCasePlural');
}

PublicFunctionTestCreate()
{
$response=$this>actor>call('GET','SectionRoutePrefixLowerCasePlural/create');
$this>assertEquals(200,$response>getStatusCode());
}

PublicFunctionTestStore()
{
$response=$this>actor>call('POST','SectionRoutePrefixLowerCasePlural',$this>LowerCase>toArray());

$this>assertEquals(302,$response>getStatusCode());
$this>assertRedirectedTo('SectionRoutePrefixLowerCasePlural/'.$this>LowerCase>id.'/edit');
}

PublicFunctionTestEdit()
{
$this>actor>call('POST','SectionRoutePrefixLowerCasePlural',$this>LowerCase>toArray());

$response=$this>actor>call('GET','/SectionRoutePrefixLowerCasePlural/'.$this>LowerCase>id.'/edit');
$this>assertEquals(200,$response>getStatusCode());
$this>assertViewHas('LowerCase');
}

PublicFunctionTestUpdate()
{
$this>actor>call('POST','SectionRoutePrefixLowerCasePlural',$this>LowerCase>toArray());
$response=$this>actor>call('PATCH','SectionRoutePrefixLowerCasePlural/1',$this>LowerCaseEdited>toArray());

$this>assertEquals(302,$response>getStatusCode());
$this>seeInDatabase('TableName',$this>LowerCaseEdited>toArray());
$this>assertRedirectedTo('/');
}

PublicFunctionTestDelete()
{
$this>actor>call('POST','SectionRoutePrefixLowerCasePlural',$this>LowerCase>toArray());

$response=$this>call('DELETE','SectionRoutePrefixLowerCasePlural/'.$this>LowerCase>id);
$this>assertEquals(302,$response>getStatusCode());
$this>assertRedirectedTo('SectionRoutePrefixLowerCasePlural');
}

}
