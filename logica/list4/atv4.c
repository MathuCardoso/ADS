#include <stdio.h>
#include <ctype.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int mes;
    int ano;

    printf("Informe um mês do ano pelo seu número (1 a 12)\n");
    scanf(" %d", &mes);

    switch (mes)
    {
        //JANEIRO
    case 1:
        printf("O mês informado é JANEIRO e possui 31 dias.");
    break;

    case 2:
        printf("O mês informado é FEVEREIRO.\nDe qual ano é este mês?");
        scanf("%d", &ano);

        if ((ano % 4 == 0 && ano % 100 != 0) || (ano % 400 == 0)) {
            printf("%d é ano bissexto!\nOu seja, fevereiro possui 29 dias.", ano);
        } else {
            printf("%d não é ano bissexto.\nFevereiro tem 28 dias.", ano);
        }    
        
    break;

    case 3:
        printf("O mês informado é MARÇO e possui 31 dias.");
    break;

    case 4:
        printf("O mês informado é ABRIL e possui 30 dias.");
    break;

    case 5:
        printf("O mês informado é MAIO e possui 31 dias.");
    break;

    case 6:
        printf("O mês informado é JUNHO e possui 30 dias.");
    break;

    case 7:
        printf("O mês informado é JULHO e possui 31 dias.");
    break;

    case 8:
        printf("O mês informado é AGOSTO e possui 31 dias.");
    break;

    case 9:
        printf("O mês informado é SETEMBRO e possui 30 dias.");
    break;

    case 10:
        printf("O mês informado é OUTUBRO e possui 31 dias.");
    break;

    case 11:
        printf("O mês informado é NOVEMBRO e possui 30 dias.");
    break;

    case 12:
        printf("O mês informado é DEZEMBRO e possui 31 dias.");
    break;
    
    default:
        printf("Mês do ano inválido! Por favor insira um mês do ano válido (1 a 12).");
    break;
    }

    return 0;
}
