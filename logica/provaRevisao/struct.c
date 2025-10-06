#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    

    struct TPessoa {
        char nome[100];
        int idade;
    };

    struct TPessoa pessoas[100];
    
    strcpy(pessoas[0].nome, "Matheus");
    pessoas[0].idade = 19;

    printf("%s\n", pessoas[0].nome);
    printf("%d", pessoas[0].idade);

    return 0;
}