package org.example;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

/**
 * This class represents a list of cities and provides methods to manage and retrieve city data.
 */
public class CityList {
    private List<City> cities = new ArrayList<>();

    /**
     * Adds a city to the list if it does not already exist.
     *
     * @param city The city to be added.
     * @throws IllegalArgumentException If the city already exists in the list.
     */
    public void add(City city) {
        if (cities.contains(city)) {
            throw new IllegalArgumentException("City already exists in the list.");
        }
        cities.add(city);
    }

    /**
     * Deletes a city from the list.
     *
     * @param city The city to be deleted.
     * @throws IllegalArgumentException If the city does not exist in the list.
     */
    public void delete(City city) {
        if (!cities.contains(city)) {
            throw new IllegalArgumentException("City does not exist in the list.");
        }
        cities.remove(city);
    }

    /**
     * Returns the total number of cities in the list.
     *
     * @return The total number of cities.
     */
    public int count() {
        return cities.size();
    }

    /**
     * Returns a sorted list of cities based on the specified sorting option.
     *
     * @param sortByCityName   Set to true to sort by city name, false to sort by province name.
     * @return The sorted list of cities.
     */
    public List<City> getCities(boolean sortByCityName) {
        List<City> cityList = new ArrayList<>(cities);
        if (sortByCityName) {
            Collections.sort(cityList);
        } else {
            Collections.sort(cityList, new CityProvinceComparator());
        }
        return cityList;
    }
}
