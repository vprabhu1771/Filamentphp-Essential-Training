```php
EditAction::make()->iconButton()
```

```php
EditAction::make()
    ->label(null) // // Desirably, the "Edit" hyperlink will be removed and only the icon will remain, but this is not currently the case.
    ->tooltip('Edit'), // Only in the tooltip the word Edit appears in this case, the hyperlink Edit remains removed
```

OR

```php
EditAction::make()
    ->disableLabel()
    ->icon('heroicon-s-pencil')
    ->tooltip('Edit'),
```