package org.example;

/**
 * This class represents a City object with a name and province.
 */
public class City implements Comparable<City> {
    private String city;
    private String province;

    /**
     * Constructs a City object with the specified name and province.
     *
     * @param city     The name of the city.
     * @param province The name of the province.
     */
    City(String city, String province) {
        this.city = city;
        this.province = province;
    }

    /**
     * Returns the name of the city.
     *
     * @return The name of the city.
     */
    String getCityName() {
        return this.city;
    }

    /**
     * Returns the name of the province.
     *
     * @return The name of the province.
     */
    String getProvinceName() {
        return this.province;
    }

    /**
     * Compares this City object to another City based on city name.
     *
     * @param city The City object to compare to.
     * @return A negative integer, zero, or a positive integer as this object is less than, equal to, or greater than the specified object.
     */
    @Override
    public int compareTo(City city) {
        return this.city.compareTo(city.getCityName());
    }
}
