#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char str[200];
    char carac;
    int i, rep = 0;

    

    printf("Digite uma frase: \n");
    fgets(str, sizeof(str), stdin);

    printf("Qual caractere eu devo contar? ");
    scanf("%c", &carac);

    int len = strlen(str);

    
    for(i = 0; i < len; i++) {
        if(str[i] == carac)
            rep++;
    }

    printf("\nA letra '%c' se repete %d vezes", carac, rep);

    return 0;
}