package org.example;

import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;

/**
 * Test class for CityList functionality
 */
public class TestClass {

    /**
     * Test the delete method
     */
    @Test
    public void testdelete() {
        CityList cityList = new CityList();
        City city1 = new City("City1", "Province1");
        City city2 = new City("City2", "Province2");

        cityList.add(city1);
        cityList.add(city2);

        cityList.delete(city1);
        assertFalse(cityList.getCities().contains(city1));
    }

    /**
     * Test exception when trying to delete a non-existing city
     */
    @Test
    public void testdeleteexception() {
        CityList cityList = new CityList();
        City city1 = new City("City1", "Province1");
        City city2 = new City("City2", "Province2");

        cityList.add(city1);

        assertThrows(IllegalArgumentException.class, () -> cityList.delete(city2));
    }

    /**
     * Test the Count method
     */
    @Test
    public void testCount() {
        CityList cityList = new CityList();
        City city1 = new City("City1", "Province1");
        City city2 = new City("City2", "Province2");

        cityList.add(city1);
        cityList.add(city2);

        assertEquals(2, cityList.Count());
    }

    /**
     * Test the Sort method with city names
     */
    @Test
    public void testSortByCityName() {
        CityList cityList = new CityList();
        City city1 = new City("BCity", "Province1");
        City city2 = new City("ACity", "Province2");

        cityList.add(city1);
        cityList.add(city2);

        assertEquals("ACity", cityList.getCities().get(0).getCityName());
    }

    /**
     * Test the Sort method with province names
     */
    @Test
    public void testSortByProvinceName() {
        CityList cityList = new CityList();
        City city1 = new City("City1", "BProvince");
        City city2 = new City("City2", "AProvince");

        cityList.add(city1);
        cityList.add(city2);

        assertEquals("AProvince", cityList.getCities().get(0).getProvinceName());
    }
}
