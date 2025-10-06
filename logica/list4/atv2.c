#include <stdio.h>
#include <ctype.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int diaSemana;

    printf("Informe um dia da semana pelo seu número (1 a 7)\n");
    scanf(" %d", &diaSemana);

    switch (diaSemana)
    {
        //DOMING
    case 1:
        printf("O dia da semana informado é DOMINGO");
    break;
        //SEGUNDA
    case 2:
        printf("O dia da semana informado é SEGUNDA-FEIRA");
    break;
        //TERÇA
    case 3:
        printf("O dia da semana informado é TERÇA-FEIRA");
    break;
        //QUARTA
    case 4:
        printf("O dia da semana informado é QUARTA-FEIRA");
    break;
        //QUINTA
    case 5:
        printf("O dia da semana informado é QUINTA-FEIRA");
    break;
    //SEXTA
    case 6:
        printf("O dia da semana informado é SEXTA-FEIRA");
    break;
        //SÁBADO
    case 7:
        printf("O dia da semana informado é SÁBADO");
    break;
    
    default:
        printf("Dia da semana inválido! Por favor insira um dia da semana válido (1, 2, 3, 4, 5, 6 ou 7).");
    break;
    }

    return 0;
}
