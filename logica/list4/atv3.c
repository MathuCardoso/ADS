#include <stdio.h>
#include <ctype.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int trimestre;

    printf("Informe um mês do ano pelo seu número (1 a 12)\n");
    scanf(" %d", &trimestre);

    switch (trimestre)
    {
        //1º TRIMESTRE
    case 1:
    case 2:
    case 3:
        printf("O mês informado faz parte do 1º TRIMESTRE.");
    break;
        //2º TRIMESTRE
    case 4:
    case 5:
    case 6:
        printf("O mês informado faz parte do 2º TRIMESTRE.");
    break;
        //3º TRIMESTRE
    case 7:
    case 8:
    case 9:
        printf("O mês informado faz parte do 3º TRIMESTRE.");
    break;
        //4º TRIMESTRE
    case 10:
    case 11:
    case 12:
        printf("O mês informado faz parte do 4º TRIMESTRE.");
    break;
    
    default:
        printf("Mês do ano inválido! Por favor insira um mês do ano válido (1 a 12).");
    break;
    }

    return 0;
}
