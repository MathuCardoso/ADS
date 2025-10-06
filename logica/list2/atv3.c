#include <stdio.h>

int main()
{
    
    int segundos, minutos, horas;

    printf("Digite uma duracao de tempo em segundos: ");
    scanf("%d", &segundos);

    horas = segundos / 3600;
    minutos = (segundos % 3600) / 60;
    segundos = segundos % 60;

    printf("%d: %d: %d", horas, minutos, segundos);

    return 0;
}
