#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    

    char str1[100], str2[100];

    printf("Digite uma frase: ");
    fgets(str1, sizeof(str1), stdin);

    printf("Digite outra frase: ");
    fgets(str2, sizeof(str2), stdin);

    int result = strcmp(str1, str2);

    if(result == 0) {
        printf("As strings são iguais.");
    } else {
        printf("As strings são difentes.");
    }


    return 0;
}