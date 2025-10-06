#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char nome[100];

    printf("Digite seu nome: ");
    fgets(nome, 255, stdin);
    nome[strlen(nome) - 1] = '\0';
    printf("Seu nome é %s", nome);
    printf("Sua idade é 19");

    return 0;
}