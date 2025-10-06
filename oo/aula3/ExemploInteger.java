public class ExemploInteger {
    public static void main(String[] args) {
        String s1 = "10";
        System.out.println("s1: " + s1);

        //Converter de string para int

        int i1 = Integer.parseInt(s1);
        System.out.println("i1: " + i1 );

        //Converter int para string
        Integer i2 = 5;
        // s1 = i2.toString();
        // s1 = Integer.toString(i2);
        //s1 = il.toString(); não é possível pois il é tipo primitivo.

        //converter de integer para float
        float f1 = i2.floatValue() / 3;
        System.out.println("f1: " + String.format("%.02f", f1));

        //comparações
        Integer i3 = 10;
        int i4 = 10;
        System.out.println(i3 == i4);
        System.out.println(i3.equals(i4));
    }
}