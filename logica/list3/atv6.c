#include <stdio.h>
int main()
{
    float salario;

    printf("Qual seu salário?\n");
    scanf("%f", &salario);

    if (salario >= 0.00 && salario <= 990.00)
    {
        salario = (salario * 120) / 100;
        printf("Seu salário foi reajustado em 20%%. Novo valor: R$%.2f.\n", salario);

    } else if(salario >= 990.01 && salario <= 1480.00) {

        salario = (salario * 110) / 100;
        printf("Seu salário foi reajustado em 10%%. Novo valor: R$%.2f.\n", salario);

    } else if(salario >= 1480.01 && salario <= 2000.00) {

        salario = (salario * 105) / 100;
        printf("Seu salário foi reajustado em 05%%. Novo valor: R$%.2f.\n", salario);

    } else if(salario > 2000.00) {
        printf("Nao havera reajuste de salario.");
    }
    

    return 0;
}
