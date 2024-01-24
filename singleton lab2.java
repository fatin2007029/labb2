
 interface Shape {
    void draw();
}

 class Rectangle implements Shape {
    @Override
    public void draw() {
        System.out.println("Inside Rectangle::draw() method.");
    }
}

 class Square implements Shape {
    @Override
    public void draw() {
        System.out.println("Inside Square::draw() method.");
    }
}

 class ShapeFactory {
    private static ShapeFactory example;
    
    private ShapeFactory() {
    }
    public static ShapeFactory getIns() {
        if (example == null) {
            example = new ShapeFactory();
        }
        return example;
    }

    public Shape getShape(String shapeType) {
        if (shapeType == null) {
            return null;
        }
        if (shapeType.equalsIgnoreCase("RECTANGLE")) {
            return new Rectangle();
        } else if (shapeType.equalsIgnoreCase("SQUARE")) {
            return new Square();
        }
        return null;
    }
}

 class FactoryPatternDemo {
    public static void main(String[] args) {
        ShapeFactory shapeFactory = ShapeFactory.getIns();
        
        Shape shape1 = shapeFactory.getShape("RECTANGLE");
        shape1.draw();

        Shape shape2 = shapeFactory.getShape("SQUARE");
        shape2.draw();
    }
}

