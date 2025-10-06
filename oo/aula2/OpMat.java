public class OpMat {
    public int somar(int num1, int num2) {
        return num1 + num2;
    }

    public int sub(int num1, int num2) {
        return num1 - num2;
    }

    public float div(int num1, int num2) {
        if(num2 == 0) {
            return 0;            
        } else 
            return num1 / num2;
    }

    public int multi(int num1, int num2) {
        return num1 * num2;
    }

    public static void main(String[] args) {
        System.out.println();
    }
}
