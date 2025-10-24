import java.time.LocalTime;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;


public class LocalDate {
    public static void main(String[] args) {
        LocalDate data = LocalDate.now();
        System.out.println(data);

        LocalTime hora = LocalTime.now();
        System.out.println(hora);

        LocalDateTime dataHora = LocalDateTime.now();
        System.out.println(dataHora);


    }
}