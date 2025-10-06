#include <stdio.h>
#include <ctype.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    char cat;

    printf("Qual a categoria da sua carteira de habilitação?\n[A]\n[B]\n[C]\n[D]\n[E]\n");
    scanf(" %c", &cat);
    cat = toupper(cat);

    switch (cat)
    {
        //MOTO
    case 'A':
        printf("Você é habilitado a dirigir moto!");
    break;
        //CARRO
    case 'B':
        printf("Você é habilitado a dirigir carro!");
    break;
        //CAMINHÃO
    case 'C':
        printf("Você é habilitado a dirigir caminhão!");
    break;
        //ÔNIBUS
    case 'D':
        printf("Você é habilitado a dirigir ônibus!");
    break;
        //CARRETA
    case 'E':
        printf("Você é habilitado a dirigir carreta!");
    
    default:
        printf("Categoria inválida! Por favor, insira uma categoria válida (A, B, C, D ou E).");
    break;
    }

    return 0;
}
