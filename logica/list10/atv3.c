#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char str[300];
    int i, rep = 0;

    

    printf("Digite um texto e eu identificarei quantas vezes a letra'O' se repete:\n");
    fgets(str, sizeof(str), stdin);
    int len = strlen(str);

    //O for para quando encontra uma letra acentuada.
    //Exemplo: na frase "oi como você está? Tudo bem com voce?", o for percorre apenas
    //o seguinte trecho "oi como você está".
    for(i = 0; i < len; i++) {
        if(str[i] == 'o')
            rep++;
    }

    printf("A letra 'o' se repete %d vezes", rep);

    return 0;
}