import MuiButton, { ButtonProps as MuiButtonProps } from '@mui/material/Button'

interface ButtonProps extends MuiButtonProps {
  uppercase?: boolean
}

export function Button({ uppercase, ...props }: ButtonProps) {
  return (
    <MuiButton
      {...props}
      sx={{ textTransform: uppercase ? 'uppercase' : 'none' }}
    />
  )
}
