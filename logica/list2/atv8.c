#include <stdio.h>
#include <math.h>

int main()
{

    double n1, n2, n3, n4, mq;

    printf("Digite o primeiro numero: ");
    scanf("%lf", &n1);

    printf("Digite o segundo numero: ");
    scanf("%lf", &n2);

    printf("Digite o terceiro numero: ");
    scanf("%lf", &n3);

    printf("Digite o quarto numero: ");
    scanf("%lf", &n4);

    mq = sqrt((pow(n1,2) + pow(n2, 2) + pow(n3, 2) + pow(n4, 2)) / 4);

    printf("A média quadratica destes numeros e: %.2f", mq);


    

    /* code */
    return 0;
}
