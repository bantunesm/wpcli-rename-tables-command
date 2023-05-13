# WP-CLI Rename Tables Command

## Description

Le plugin "WP-CLI Rename Tables Command" est une extension WordPress qui offre la possibilité de renommer les tables de la base de données à partir de la ligne de commande. Ce plugin est compatible avec WP-CLI.

## Version

1.0

## Utilisation

Pour utiliser cette commande, vous devez spécifier l'ancien préfixe de la table et le nouveau préfixe que vous souhaitez utiliser.

Voici un exemple d'utilisation :

```
wp rename-tables wp_ new_prefix_
```

Dans cet exemple, `wp_` est l'ancien préfixe et `new_prefix_` est le nouveau préfixe.

## Options

- `<old_prefix>` : L'ancien préfixe à remplacer.
- `<new_prefix>` : Le nouveau préfixe 
