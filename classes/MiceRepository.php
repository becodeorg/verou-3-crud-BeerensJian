<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class MiceRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {

    }

    // Get one
    public function find(): array
    {

    }

    // Get all
    public function get(): array
    {
        // TODO: replace dummy data by real one
        //return [
            //['name' => 'dummy one'],
            //['name' => 'dummy two'],
        //];
        // Make an SQL statement
        $sql = "SELECT * FROM mice";
        // Execute the query and get the result
        $result = $this->databaseManager->connection->query($sql, PDO::FETCH_ASSOC);
        // fetch the rows as an array
        return $result->fetchAll();




        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function getUpdateData(): array
    {
        $fetchSQL = "SELECT * FROM mice WHERE id={$_GET['id']}";
        return $this->databaseManager->connection->query($fetchSQL, PDO::FETCH_ASSOC)->fetchAll();
    }

    public function delete(): void
    {

    }

}