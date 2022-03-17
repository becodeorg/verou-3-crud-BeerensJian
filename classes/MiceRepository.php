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
        $sql = "INSERT INTO mice (name, price, weight, brand) VALUES ('{$_GET['name']}', {$_GET['price']}, {$_GET['weight']}, '{$_GET['brand']}')";
        try {
            $this->databaseManager->connection->exec($sql);
            echo "Entry Created Successfully";
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
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

    public function update(int $idToUpdate, string $newName, float $newPrice, int $newWeight, string $newBrand) : void
    {

        try {
            $sql = "UPDATE mice SET name='{$newName}', price={$newPrice}, weight={$newWeight}, brand='{$newBrand}' WHERE id={$idToUpdate}";
            $this->databaseManager->connection->exec($sql);

        } catch (PDOException $e) {
            echo "<br>" . $e ->getMessage();
        }

    }

    public function delete(): void
    {
        try {
            $sql = "DELETE FROM mice WHERE id={$_GET["id"]}";
            $this->databaseManager->connection->exec($sql);
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
        }
    }

}